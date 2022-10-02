<?php
use app\models\Country;

use yii\data\ActiveDataProvider;
use yii\helpers\Html;

use kartik\form\ActiveForm;
use kartik\builder\TabularForm;
use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var kartik\form\ActiveForm $form */

$this->title = 'My Yii Application';

$dataProvider = new ActiveDataProvider([
    'query' => Country::find()
]);

?>
<div class="site-index">
<?php
$form = ActiveForm::begin();
echo TabularForm::widget([
    'form' => $form,
    'dataProvider' => $dataProvider,
    'attributes' => [
        'code' => ['type' => TabularForm::INPUT_STATIC],
        'name' => [
            'type' => TabularForm::INPUT_STATIC, 
            'options'=>['class'=>'form-control text-right'], 
            'columnOptions'=>['hAlign'=>GridView::ALIGN_RIGHT]
        ],
        'population' => [
            'type' => TabularForm::INPUT_STATIC, 
            'columnOptions'=>['hAlign'=>GridView::ALIGN_RIGHT]
        ],
    ],
    'gridSettings' => [
        'floatHeader' => true,
        'panel' => [
            'heading' => 'Countries',
            'type' => GridView::TYPE_PRIMARY,
        ]
    ],
    'actionColumn' => false
]); 
ActiveForm::end(); 
?>

</div>
