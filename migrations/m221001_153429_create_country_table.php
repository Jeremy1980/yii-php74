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
         array( 'AUS' ,'Australia' ,'24016400' ,'1664639111' )
        ,array( 'BRA' ,'Brazil' ,'205722000' ,'1664639111' )
        ,array( 'CAN' ,'Canada' ,'35985751' ,'1664639134' )
        ,array( 'CHN' ,'China' ,'1375210000' ,'1664639134' )
        ,array( 'DEU' ,'Germany' ,'81459000' ,'1664639134' )
        ,array( 'FRA' ,'France' ,'64513242' ,'1664639187' )
        ,array( 'GBR' ,'United Kingdom' ,'65097000','1664639187' )
        ,array( 'IND' ,'India' ,'1285400000' ,'1664639187' )
        ,array( 'POL' ,'Poland' ,'37510606' ,'1664639279' )
        ,array( 'RUS' ,'Russia' ,'146519759' ,'1664639279' )
        ,array( 'USA' ,'United States' ,'322976000' ,'1664639279' )
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
                'code' => $this->char(3),
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
