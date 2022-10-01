<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%country}}`.
 */
class m221001_153429_create_country_table extends Migration
{

    /* `yii2basic`.`country` */
    private $country_names = array('code','name','population','timestamp');
    private $country_values = array(
         array( 'AU' ,'Australia' ,'24016400' ,'1664639111' )
        ,array( 'BR' ,'Brazil' ,'205722000' ,'1664639111' )
        ,array( 'CA' ,'Canada' ,'35985751' ,'1664639134' )
        ,array( 'CN' ,'China' ,'1375210000' ,'1664639134' )
        ,array( 'DE' ,'Germany' ,'81459000' ,'1664639134' )
        ,array( 'FR' ,'France' ,'64513242' ,'1664639187' )
        ,array( 'GB' ,'United Kingdom' ,'65097000','1664639187' )
        ,array( 'IN' ,'India' ,'1285400000' ,'1664639187' )
        ,array( 'PL' ,'Poland' ,'37510606' ,'1664639279' )
        ,array( 'RU' ,'Russia' ,'146519759' ,'1664639279' )
        ,array( 'US' ,'United States' ,'322976000' ,'1664639279' )
    );

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName = $this->db->tablePrefix . 'country';
        if ($this->db->getTableSchema($tableName, true) === null)
        {
            $this->createTable('{{%country}}', [
                'id' => $this->primaryKey(),
                'code' => $this->char(2),
                'name' => $this->char(52),
                'population' => $this->integer(),
                'timestamp' => $this->integer(),
            ]);
        }
        
        $this->batchInsert('country', $this->country_names, $this->country_values);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
