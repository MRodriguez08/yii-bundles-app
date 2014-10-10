<?php

/**
 * This is the model class for table "properties".
 *
 * The followings are the available columns in table 'properties':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $propertytype
 * @property integer $hasseaview
 * @property integer $hasheating
 * @property double $commonexpenses
 * @property integer $constructionyearapprox
 * @property string $coordlatitude
 * @property string $coordlongitude
 * @property integer $totalbathrooms
 * @property integer $mts2surface
 * @property integer $house_totalfloors
 * @property integer $ishorizontalproperty
 * @property integer $totalbedrooms
 * @property integer $floornumber
 * @property integer $haselevator
 * @property integer $hasfloorman
 * @property integer $haselectricdoorman
 * @property integer $hasmonitoring
 * @property string $comercialproperty_type
 * @property string $comercialproperty_type_observation
 * @property integer $hasupstairs
 * @property integer $mainsaloonheight
 * @property integer $comercialproperty_totalfloors
 * @property integer $hasparking
 * @property integer $hasdeposit
 * @property string $contractedpower
 * @property integer $state_id
 *
 * The followings are the available model relations:
 * @property ImagenesInmueble[] $imagenesInmuebles
 * @property EstadosInmueble $fkEstado
 */
class Property extends CActiveRecord {

    public $modelImagenes;
    public $strArrayImagenes;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'properties';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, description, propertytype, state_id,propertyoperation', 'required', 'message' => Yii::app()->params["emptyValueErrorMessage"]),
            array('hasseaview, hasheating, constructionyearapprox, totalbathrooms, mts2surface, house_totalfloors, ishorizontalproperty, totalbedrooms, floornumber, haselevator, hasfloorman, haselectricdoorman, hasmonitoring, hasupstairs, mainsaloonheight, comercialproperty_totalfloors, hasparking, hasdeposit, state_id', 'numerical', 'integerOnly' => true),
            array('commonexpenses, propertyprice,department_id,city_id,neighbourhood_id', 'numerical'),
            array('title,shortstreetaddress', 'length', 'max' => 100),
            array('description,longstreetaddress', 'length', 'max' => 2048),
            array('propertytype, comercialproperty_type', 'length', 'max' => 50),
            array('comercialproperty_type_observation', 'length', 'max' => 1024),
            array('contractedpower', 'length', 'max' => 10),
            array('coordlatitude, coordlongitude', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, description, propertytype, hasseaview, hasheating, commonexpenses, constructionyearapprox, coordlatitude, coordlongitude, totalbathrooms, mts2surface, house_totalfloors, ishorizontalproperty, totalbedrooms, floornumber, haselevator, hasfloorman, haselectricdoorman, hasmonitoring, comercialproperty_type, comercialproperty_type_observation, hasupstairs, mainsaloonheight, comercialproperty_totalfloors, hasparking, hasdeposit, contractedpower, state_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'imagenesInmuebles' => array(self::HAS_MANY, 'ImagenInmueble', 'id_inmueble'),
            'fkEstado' => array(self::BELONGS_TO, 'EstadosInmueble', 'state_id'),
            'fkDepartamento' => array(self::BELONGS_TO, 'Departamento', 'department_id'),
            'fkCiudad' => array(self::BELONGS_TO, 'Ciudad', 'city_id'),
            'fkBarrio' => array(self::BELONGS_TO, 'Barrio', 'neighbourhood_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'T&iacute;tulo',
            'description' => 'Descripci&oacute;n',
            'propertytype' => 'Tipo de inmueble',
            'hasseaview' => 'Vista al mar',
            'hasheating' => 'Tiene calefacci&oacute;n',
            'commonexpenses' => 'Gastos Comunes',
            'constructionyearapprox' => 'A&ntilde;o de construccion aproximado',
            'coordlatitude' => 'Coordenada latitud',
            'coordlongitude' => 'Coordenara longitud',
            'totalbathrooms' => 'Cantidad de ba&ntilde;os',
            'mts2surface' => 'Mts2 edificados',
            'house_totalfloors' => 'Cantidad de plantas',
            'ishorizontalproperty' => 'Es propiedad horizontal',
            'totalbedrooms' => 'Cantidad de dormitorios',
            'floornumber' => 'N&uacute;mero de piso',
            'haselevator' => 'Tiene ascensor',
            'hasfloorman' => 'Tiene porter&iacute;a',
            'haselectricdoorman' => 'Tiene portero el&eacute;ctrico',
            'hasmonitoring' => 'Tiene vigilancia',
            'comercialproperty_type' => 'Tipo de local',
            'comercialproperty_type_observation' => 'Observacion de tipo de local',
            'hasupstairs' => 'Tiene Planta Alta',
            'mainsaloonheight' => 'Altura salon principal',
            'comercialproperty_totalfloors' => 'Cantidad plantas',
            'hasparking' => 'Tiene Estacionamiento',
            'hasdeposit' => 'Tiene dep&oacute;sito',
            'contractedpower' => 'Potencia Contratada',
            'state_id' => 'Estado del inmueble',
            'propertyprice' => 'Precio',
            'propertyoperation' => 'Operaci&oacute;n',
            'shortstreetaddress' => 'Direcci&oacute;n',
            'department_id' => 'Departamento',
            'city_id' => 'Ciudad',
            'neighbourhood_id' => 'Barrio',
            'longstreetaddress' => 'Direcci&oacute;n larga'
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('propertytype', $this->propertytype, true);
        $criteria->compare('hasseaview', $this->hasseaview);
        $criteria->compare('hasheating', $this->hasheating);
        $criteria->compare('commonexpenses', $this->commonexpenses);
        $criteria->compare('constructionyearapprox', $this->constructionyearapprox);
        $criteria->compare('coordlatitude', $this->coordlatitude, true);
        $criteria->compare('coordlongitude', $this->coordlongitude, true);
        $criteria->compare('totalbathrooms', $this->totalbathrooms);
        $criteria->compare('mts2surface', $this->mts2surface);
        $criteria->compare('house_totalfloors', $this->house_totalfloors);
        $criteria->compare('ishorizontalproperty', $this->ishorizontalproperty);
        $criteria->compare('totalbedrooms', $this->totalbedrooms);
        $criteria->compare('floornumber', $this->floornumber);
        $criteria->compare('haselevator', $this->haselevator);
        $criteria->compare('hasfloorman', $this->hasfloorman);
        $criteria->compare('haselectricdoorman', $this->haselectricdoorman);
        $criteria->compare('hasmonitoring', $this->hasmonitoring);
        $criteria->compare('comercialproperty_type', $this->comercialproperty_type, true);
        $criteria->compare('comercialproperty_type_observation', $this->comercialproperty_type_observation, true);
        $criteria->compare('hasupstairs', $this->hasupstairs);
        $criteria->compare('mainsaloonheight', $this->mainsaloonheight);
        $criteria->compare('comercialproperty_totalfloors', $this->comercialproperty_totalfloors);
        $criteria->compare('hasparking', $this->hasparking);
        $criteria->compare('hasdeposit', $this->hasdeposit);
        $criteria->compare('contractedpower', $this->contractedpower, true);
        $criteria->compare('state_id', $this->state_id);
        $criteria->compare('shortstreetaddress', $this->shortstreetaddress);

        return new CActiveDataProvider($this, array(
            'pagination' => array('pageSize' => 10),
            'criteria' => $criteria,
        ));
    }

    /**
     * 
     * @param type $filters
     * @return type
     */
    public static function findByFilters($filters) {
        $criteria = new CDbCriteria;

        $criteria->addInCondition('propertytype', $filters[WsParameters::F_TIPO_INMUEBLE]);
        $criteria->addInCondition('propertyoperation', $filters[WsParameters::F_TIPO_TRANSACCION]);


        // condicion para busqueda por texto coincidente a title o description
        $filtroStr1 = new CDbCriteria;
        $filtroStr1->compare('title', $filters[WsParameters::F_FILTRO_STR], true);
        $filtroStr2 = new CDbCriteria;
        $filtroStr2->compare('description', $filters[WsParameters::F_FILTRO_STR], true);
        $filtroStr1->mergeWith($filtroStr2, 'OR');

        $criteria->mergeWith($filtroStr1, 'AND');

        if (in_array($filters[WsParameters::F_CANT_BANIOS], array(1, 2, 3))) {
            $criteriaCantBanios = new CDbCriteria;
            if (in_array($filters[WsParameters::F_CANT_BANIOS], array(1, 2))) {
                $criteriaCantBanios->addCondition('totalbathrooms = :cantidadBanios');
            } else {
                $criteriaCantBanios->addCondition('totalbathrooms >= :cantidadBanios');
            }

            $criteriaCantBanios->params = array(
                ':cantidadBanios' => $filters[WsParameters::F_CANT_BANIOS]
            );
            $criteria->mergeWith($criteriaCantBanios, 'AND');
        }

        if (in_array($filters[WsParameters::F_CANT_HABITACIONES], array(1, 2, 3, 4))) {
            $criteriaCantHabitaciones = new CDbCriteria;
            if (in_array($filters[WsParameters::F_CANT_HABITACIONES], array(1, 2, 3, 4))) {
                $criteriaCantHabitaciones->addCondition('totalbedrooms = :totalBedrooms');
            } else {
                $criteriaCantHabitaciones->addCondition('totalbedrooms >= :totalBedrooms');
            }

            $criteriaCantHabitaciones->params = array(
                ':totalBedrooms' => $filters[WsParameters::F_CANT_HABITACIONES]
            );
            $criteria->mergeWith($criteriaCantHabitaciones, 'AND');
        }

        $criteriaPrecioDesde = new CDbCriteria;
        if ($filters[WsParameters::F_PRECIO_DESDE] > 0) {
            $criteriaPrecioDesde->addCondition('propertyprice >= :startPriceFilter');
            $criteriaPrecioDesde->params = array(
                ':startPriceFilter' => $filters[WsParameters::F_PRECIO_DESDE]
            );
            $criteria->mergeWith($criteriaPrecioDesde, 'AND');
        }

        $criteriaPrecioHasta = new CDbCriteria;
        if ($filters[WsParameters::F_PRECIO_HASTA] > 0) {
            $criteriaPrecioHasta->addCondition('propertyprice <= :endPriceFilter');
            $criteriaPrecioHasta->params = array(
                ':endPriceFilter' => $filters[WsParameters::F_PRECIO_HASTA]
            );
            $criteria->mergeWith($criteriaPrecioHasta, 'AND');
        }


        $criteria->limit = $filters["cantItems"];
        $criteria->offset = $filters["offsetFilter"];

        return Inmueble::model()->findAll($criteria);
    }

    /**
     * 
     * @param type $filters
     * @return type
     */
    public static function countByFilters($filters) {
        $criteria = new CDbCriteria;

        $criteria->addInCondition('propertytype', $filters[WsParameters::F_TIPO_INMUEBLE]);
        $criteria->addInCondition('propertyoperation', $filters[WsParameters::F_TIPO_TRANSACCION]);


        // condicion para busqueda por texto coincidente a title o description
        $filtroStr1 = new CDbCriteria;
        $filtroStr1->compare('title', $filters[WsParameters::F_FILTRO_STR], true);
        $filtroStr2 = new CDbCriteria;
        $filtroStr2->compare('description', $filters[WsParameters::F_FILTRO_STR], true);
        $filtroStr1->mergeWith($filtroStr2, 'OR');

        $criteria->mergeWith($filtroStr1, 'AND');

        if (in_array($filters[WsParameters::F_CANT_BANIOS], array(1, 2, 3))) {
            $criteriaCantBanios = new CDbCriteria;
            if (in_array($filters[WsParameters::F_CANT_BANIOS], array(1, 2))) {
                $criteriaCantBanios->addCondition('totalbathrooms = :cantidadBanios');
            } else {
                $criteriaCantBanios->addCondition('totalbathrooms >= :cantidadBanios');
            }

            $criteriaCantBanios->params = array(
                ':cantidadBanios' => $filters[WsParameters::F_CANT_BANIOS]
            );
            $criteria->mergeWith($criteriaCantBanios, 'AND');
        }

        if (in_array($filters[WsParameters::F_CANT_HABITACIONES], array(1, 2, 3, 4))) {
            $criteriaCantHabitaciones = new CDbCriteria;
            if (in_array($filters[WsParameters::F_CANT_HABITACIONES], array(1, 2, 3, 4))) {
                $criteriaCantHabitaciones->addCondition('totalbedrooms = :totalBedrooms');
            } else {
                $criteriaCantHabitaciones->addCondition('totalbedrooms >= :totalBedrooms');
            }

            $criteriaCantHabitaciones->params = array(
                ':totalBedrooms' => $filters[WsParameters::F_CANT_HABITACIONES]
            );
            $criteria->mergeWith($criteriaCantHabitaciones, 'AND');
        }

        $criteriaPrecioDesde = new CDbCriteria;
        if ($filters[WsParameters::F_PRECIO_DESDE] > 0) {
            $criteriaPrecioDesde->addCondition('propertyprice >= :startPriceFilter');
            $criteriaPrecioDesde->params = array(
                ':startPriceFilter' => $filters[WsParameters::F_PRECIO_DESDE]
            );
            $criteria->mergeWith($criteriaPrecioDesde, 'AND');
        }

        $criteriaPrecioHasta = new CDbCriteria;
        if ($filters[WsParameters::F_PRECIO_HASTA] > 0) {
            $criteriaPrecioHasta->addCondition('propertyprice <= :endPriceFilter');
            $criteriaPrecioHasta->params = array(
                ':endPriceFilter' => $filters[WsParameters::F_PRECIO_HASTA]
            );
            $criteria->mergeWith($criteriaPrecioHasta, 'AND');
        }

        return (int) Inmueble::model()->count($criteria);
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Inmueble the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getListaEstadosInmueble() {
        return CHtml::listData(EstadoInmueble::model()->findAll(), 'id', 'name');
    }

    public function findDestacados() {
        $destacados = DestacadoInmueble::model()->findAll(
                array('order' => 'id')
        );

        $properties = array();
        foreach ($destacados as $dest) {
            array_push($properties, Inmueble::model()->findByPk($dest->id_inmueble));
        }

        return $properties;
    }

    public function toArray() {
        $arr = $this->attributes;
        $arr["imagenes"] = $this->imagesToArray();
        return $arr;
    }

    public function imagesToArray() {
        $imgsArr = array();
        foreach ($this->imagenesInmuebles as $img) {
            $imgArr = array();
            $imgArr["ruta"] = "propertyImage?idInmueble=" . $this->id . "&idArchivo=" . $img->ruta;
            $imgArr["title"] = "";
            array_push($imgsArr, $imgArr);
        }
        return $imgsArr;
    }

    public function imagesToStringArray() {
        $imgsStrArr = "";
        foreach ($this->imagenesInmuebles as $img) {
            $imgsStrArr .= "propertyImage?idInmueble=" . $this->id . "&idArchivo=" . $img->ruta . "|";
        }
        return substr($imgsStrArr, 0, -1);
    }

    public function countByTipo() {
        $data = Yii::app()->db->createCommand()
                ->select('propertytype, COUNT(*) as count')
                ->from('properties')
                ->group('propertytype')
                ->queryAll();
        return $data;
    }

    public function countByEstado() {
        $data = Yii::app()->db->createCommand()
                ->select('e.name as property_state, COUNT(*) as count')
                ->from('property p,property_states e')
                ->where('p.state_id = e.id')
                ->group('e.name')
                ->queryAll();
        return $data;
    }

    public function countByBarrio() {
        $sql = "select e.name as property_neighbourhoos, count(*) as count
            from property i left join neighbourhood e on i.neighbourhood_id = e.id
            group by e.name;";
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $data = array();
        foreach ($command->query() as $row) {
            array_push($data, $row);
        }
        return $data;
    }

    public function count() {
        $data = Yii::app()->db->createCommand()
                ->select('COUNT(*) as count')
                ->from('properties')
                ->queryAll();
        return $data[0]["count"];
    }
    
    public function deleteAllImages(){
        ImagenInmueble::model()->deleteAll('id_inmueble = :idInmueble', array('idInmueble' => $this->id));
    }

}