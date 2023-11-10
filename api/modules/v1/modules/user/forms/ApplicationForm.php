<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 10 2023 0:58:41
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\forms;

use api\modules\v1\base\BaseRequest;
use common\enums\ApplicationStatusEnum;
use common\models\Application;
use common\models\Category;
use Yii;
use yii\web\UploadedFile;

class ApplicationForm extends BaseRequest
{

    public Application $application;

    public $firs_name;
    public $last_name;
    public $patronymic;
    public $passport_number;

    public $application_file;
    public $specialist_id;
    public $passport_file;
    public $diploma_copy_file;
    public $diploma_app_file;
    public $photo_file;
    public $certificate_file;
    public $status;

    public function __construct(Application $application, $config = [])
    {
        $this->application = $application;
        $this->firs_name = $application->firs_name;
        $this->last_name = $application->last_name;
        $this->patronymic = $application->patronymic;
        $this->passport_number = $application->passport_number;
        $this->specialist_id = $application->specialist_id;
        $this->status = $application->status;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['specialist_id', 'status'], 'integer'],
            [['firs_name', 'last_name', 'patronymic', 'passport_number'], 'string', 'max' => 255],
            [['application_file', 'passport_file', 'diploma_copy_file', 'diploma_app_file', 'photo_file', 'certificate_file'], 'file'],
            [['specialist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['specialist_id' => 'id']],

            [['specialist_id', 'firs_name', 'last_name', 'patronymic', 'passport_number'], 'required'],
            //[['application_file', 'passport_file', 'diploma_copy_file', 'diploma_app_file', 'photo_file', 'certificate_file',], 'required'],

        ];
    }

    public function getResult()
    {
        $application = $this->application;

        $application->firs_name = $this->firs_name;
        $application->last_name = $this->last_name;
        $application->patronymic = $this->patronymic;
        $application->passport_number = $this->passport_number;
        $application->specialist_id = $this->specialist_id;
        $application->status = ApplicationStatusEnum::ARCHIVE;

        $application->save(false);
        $url = Yii::getAlias("@api/web/application");
        if (!file_exists($url)) {
            mkdir($url, 0777);
        }
        if (!file_exists($url . "/" . $application->id)) {
            mkdir($url . "/" . $application->id, 0777);
        }

        $this->uploadFile('application_file');
        $this->uploadFile('passport_file');
        $this->uploadFile('diploma_copy_file');
        $this->uploadFile('diploma_app_file');
        $this->uploadFile('photo_file');
        $this->uploadFile('certificate_file');

        return $application->save(false);
    }

    private function uploadFile($attribute)
    {
        $application = $this->application;
        $file = UploadedFile::getInstanceByName($attribute);
        if ($file) {
            $fileName = security()->generateRandomString() . "." . $file->extension;
            $url = Yii::getAlias("@api/web/application");
            $file->saveAs($url . "/" . $application->id . "/" . $fileName);
            $application->{$attribute} = $fileName;
            return $fileName;
        }
    }
}