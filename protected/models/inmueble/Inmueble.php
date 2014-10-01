<?php

/**
 * This is the model class for table "inmuebles".
 *
 * The followings are the available columns in table 'inmuebles':
 * @property integer $id
 * @property string $titulo
 * @property string $descripcion
 * @property string $tipo_inmueble
 * @property integer $vista_al_mar
 * @property integer $tiene_calefaccion
 * @property double $gastos_comunes
 * @property integer $anio_construccion_aproximado
 * @property string $coord_latitud
 * @property string $coord_longitud
 * @property integer $cant_banios
 * @property integer $mts2_edificados
 * @property integer $cant_plantas_casa
 * @property integer $es_propiedad_horizontal
 * @property integer $cant_dormitorios
 * @property integer $numero_de_piso
 * @property integer $tiene_ascensor
 * @property integer $tiene_porteria
 * @property integer $tiene_portero_electrico
 * @property integer $tiene_vigilancia
 * @property string $tipo_local
 * @property string $tipo_local_observacion
 * @property integer $tiene_planta_alta
 * @property integer $altura_salon_principal
 * @property integer $cant_plantas_local
 * @property integer $tiene_estacionamiento
 * @property integer $tiene_deposito
 * @property string $potencia_contratada
 * @property integer $fk_estado
 *
 * The followings are the available model relations:
 * @property ImagenesInmueble[] $imagenesInmuebles
 * @property EstadosInmueble $fkEstado
 */
class Inmueble extends CActiveRecord {

    public $modelImagenes;
    public $strArrayImagenes;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'inmuebles';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('titulo, descripcion, tipo_inmueble, fk_estado,operacion_publicacion', 'required', 'message' => Yii::app()->params["templateEmptyValueErrorMessage"]),
            array('vista_al_mar, tiene_calefaccion, anio_construccion_aproximado, cant_banios, mts2_edificados, cant_plantas_casa, es_propiedad_horizontal, cant_dormitorios, numero_de_piso, tiene_ascensor, tiene_porteria, tiene_portero_electrico, tiene_vigilancia, tiene_planta_alta, altura_salon_principal, cant_plantas_local, tiene_estacionamiento, tiene_deposito, fk_estado', 'numerical', 'integerOnly' => true),
            array('gastos_comunes, precio_publicacion,id_departamento,id_ciudad,id_barrio', 'numerical'),
            array('titulo,direccion_corta', 'length', 'max' => 100),
            array('descripcion,direccion_larga', 'length', 'max' => 2048),
            array('tipo_inmueble, tipo_local', 'length', 'max' => 50),
            array('tipo_local_observacion', 'length', 'max' => 1024),
            array('potencia_contratada', 'length', 'max' => 10),
            array('coord_latitud, coord_longitud', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, titulo, descripcion, tipo_inmueble, vista_al_mar, tiene_calefaccion, gastos_comunes, anio_construccion_aproximado, coord_latitud, coord_longitud, cant_banios, mts2_edificados, cant_plantas_casa, es_propiedad_horizontal, cant_dormitorios, numero_de_piso, tiene_ascensor, tiene_porteria, tiene_portero_electrico, tiene_vigilancia, tipo_local, tipo_local_observacion, tiene_planta_alta, altura_salon_principal, cant_plantas_local, tiene_estacionamiento, tiene_deposito, potencia_contratada, fk_estado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'imagenesInmuebles' => array(self::HAS_MANY, 'ImagenInmueble', 'id_inmueble'),
            'fkEstado' => array(self::BELONGS_TO, 'EstadosInmueble', 'fk_estado'),
            'fkDepartamento' => array(self::BELONGS_TO, 'Departamento', 'id_departamento'),
            'fkCiudad' => array(self::BELONGS_TO, 'Ciudad', 'id_ciudad'),
            'fkBarrio' => array(self::BELONGS_TO, 'Barrio', 'id_barrio'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'titulo' => 'T&iacute;tulo',
            'descripcion' => 'Descripci&oacute;n',
            'tipo_inmueble' => 'Tipo de inmueble',
            'vista_al_mar' => 'Vista al mar',
            'tiene_calefaccion' => 'Tiene calefacci&oacute;n',
            'gastos_comunes' => 'Gastos Comunes',
            'anio_construccion_aproximado' => 'A&ntilde;o de construccion aproximado',
            'coord_latitud' => 'Coordenada latitud',
            'coord_longitud' => 'Coordenara longitud',
            'cant_banios' => 'Cantidad de ba&ntilde;os',
            'mts2_edificados' => 'Mts2 edificados',
            'cant_plantas_casa' => 'Cantidad de plantas',
            'es_propiedad_horizontal' => 'Es propiedad horizontal',
            'cant_dormitorios' => 'Cantidad de dormitorios',
            'numero_de_piso' => 'N&uacute;mero de piso',
            'tiene_ascensor' => 'Tiene ascensor',
            'tiene_porteria' => 'Tiene porter&iacute;a',
            'tiene_portero_electrico' => 'Tiene portero el&eacute;ctrico',
            'tiene_vigilancia' => 'Tiene vigilancia',
            'tipo_local' => 'Tipo de local',
            'tipo_local_observacion' => 'Observacion de tipo de local',
            'tiene_planta_alta' => 'Tiene Planta Alta',
            'altura_salon_principal' => 'Altura salon principal',
            'cant_plantas_local' => 'Cantidad plantas',
            'tiene_estacionamiento' => 'Tiene Estacionamiento',
            'tiene_deposito' => 'Tiene dep&oacute;sito',
            'potencia_contratada' => 'Potencia Contratada',
            'fk_estado' => 'Estado del inmueble',
            'precio_publicacion' => 'Precio',
            'operacion_publicacion' => 'Operaci&oacute;n',
            'direccion_corta' => 'Direcci&oacute;n',
            'id_departamento' => 'Departamento',
            'id_ciudad' => 'Ciudad',
            'id_barrio' => 'Barrio',
            'direccion_larga' => 'Direcci&oacute;n larga'
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
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('tipo_inmueble', $this->tipo_inmueble, true);
        $criteria->compare('vista_al_mar', $this->vista_al_mar);
        $criteria->compare('tiene_calefaccion', $this->tiene_calefaccion);
        $criteria->compare('gastos_comunes', $this->gastos_comunes);
        $criteria->compare('anio_construccion_aproximado', $this->anio_construccion_aproximado);
        $criteria->compare('coord_latitud', $this->coord_latitud, true);
        $criteria->compare('coord_longitud', $this->coord_longitud, true);
        $criteria->compare('cant_banios', $this->cant_banios);
        $criteria->compare('mts2_edificados', $this->mts2_edificados);
        $criteria->compare('cant_plantas_casa', $this->cant_plantas_casa);
        $criteria->compare('es_propiedad_horizontal', $this->es_propiedad_horizontal);
        $criteria->compare('cant_dormitorios', $this->cant_dormitorios);
        $criteria->compare('numero_de_piso', $this->numero_de_piso);
        $criteria->compare('tiene_ascensor', $this->tiene_ascensor);
        $criteria->compare('tiene_porteria', $this->tiene_porteria);
        $criteria->compare('tiene_portero_electrico', $this->tiene_portero_electrico);
        $criteria->compare('tiene_vigilancia', $this->tiene_vigilancia);
        $criteria->compare('tipo_local', $this->tipo_local, true);
        $criteria->compare('tipo_local_observacion', $this->tipo_local_observacion, true);
        $criteria->compare('tiene_planta_alta', $this->tiene_planta_alta);
        $criteria->compare('altura_salon_principal', $this->altura_salon_principal);
        $criteria->compare('cant_plantas_local', $this->cant_plantas_local);
        $criteria->compare('tiene_estacionamiento', $this->tiene_estacionamiento);
        $criteria->compare('tiene_deposito', $this->tiene_deposito);
        $criteria->compare('potencia_contratada', $this->potencia_contratada, true);
        $criteria->compare('fk_estado', $this->fk_estado);
        $criteria->compare('direccion_corta', $this->direccion_corta);

        return new CActiveDataProvider($this, array(
            'pagination' => array('pageSize' => 10),
            'criteria' => $criteria,
        ));
    }

    /**
     * 
     * @param type $filtros
     * @return type
     */
    public static function findByFilters($filtros) {
        $criteria = new CDbCriteria;

        $criteria->addInCondition('tipo_inmueble', $filtros[WsParameters::F_TIPO_INMUEBLE]);
        $criteria->addInCondition('operacion_publicacion', $filtros[WsParameters::F_TIPO_TRANSACCION]);


        // condicion para busqueda por texto coincidente a titulo o descripcion
        $filtroStr1 = new CDbCriteria;
        $filtroStr1->compare('titulo', $filtros[WsParameters::F_FILTRO_STR], true);
        $filtroStr2 = new CDbCriteria;
        $filtroStr2->compare('descripcion', $filtros[WsParameters::F_FILTRO_STR], true);
        $filtroStr1->mergeWith($filtroStr2, 'OR');

        $criteria->mergeWith($filtroStr1, 'AND');

        if (in_array($filtros[WsParameters::F_CANT_BANIOS], array(1, 2, 3))) {
            $criteriaCantBanios = new CDbCriteria;
            if (in_array($filtros[WsParameters::F_CANT_BANIOS], array(1, 2))) {
                $criteriaCantBanios->addCondition('cant_banios = :cantidadBanios');
            } else {
                $criteriaCantBanios->addCondition('cant_banios >= :cantidadBanios');
            }

            $criteriaCantBanios->params = array(
                ':cantidadBanios' => $filtros[WsParameters::F_CANT_BANIOS]
            );
            $criteria->mergeWith($criteriaCantBanios, 'AND');
        }

        if (in_array($filtros[WsParameters::F_CANT_HABITACIONES], array(1, 2, 3, 4))) {
            $criteriaCantHabitaciones = new CDbCriteria;
            if (in_array($filtros[WsParameters::F_CANT_HABITACIONES], array(1, 2, 3, 4))) {
                $criteriaCantHabitaciones->addCondition('cant_dormitorios = :cantidadHabitaciones');
            } else {
                $criteriaCantHabitaciones->addCondition('cant_dormitorios >= :cantidadHabitaciones');
            }

            $criteriaCantHabitaciones->params = array(
                ':cantidadHabitaciones' => $filtros[WsParameters::F_CANT_HABITACIONES]
            );
            $criteria->mergeWith($criteriaCantHabitaciones, 'AND');
        }

        $criteriaPrecioDesde = new CDbCriteria;
        if ($filtros[WsParameters::F_PRECIO_DESDE] > 0) {
            $criteriaPrecioDesde->addCondition('precio_publicacion >= :precioDesde');
            $criteriaPrecioDesde->params = array(
                ':precioDesde' => $filtros[WsParameters::F_PRECIO_DESDE]
            );
            $criteria->mergeWith($criteriaPrecioDesde, 'AND');
        }

        $criteriaPrecioHasta = new CDbCriteria;
        if ($filtros[WsParameters::F_PRECIO_HASTA] > 0) {
            $criteriaPrecioHasta->addCondition('precio_publicacion <= :precioHasta');
            $criteriaPrecioHasta->params = array(
                ':precioHasta' => $filtros[WsParameters::F_PRECIO_HASTA]
            );
            $criteria->mergeWith($criteriaPrecioHasta, 'AND');
        }


        $criteria->limit = $filtros["cantItems"];
        $criteria->offset = $filtros["inicio"];

        return Inmueble::model()->findAll($criteria);
    }

    /**
     * 
     * @param type $filtros
     * @return type
     */
    public static function countByFilters($filtros) {
        $criteria = new CDbCriteria;

        $criteria->addInCondition('tipo_inmueble', $filtros[WsParameters::F_TIPO_INMUEBLE]);
        $criteria->addInCondition('operacion_publicacion', $filtros[WsParameters::F_TIPO_TRANSACCION]);


        // condicion para busqueda por texto coincidente a titulo o descripcion
        $filtroStr1 = new CDbCriteria;
        $filtroStr1->compare('titulo', $filtros[WsParameters::F_FILTRO_STR], true);
        $filtroStr2 = new CDbCriteria;
        $filtroStr2->compare('descripcion', $filtros[WsParameters::F_FILTRO_STR], true);
        $filtroStr1->mergeWith($filtroStr2, 'OR');

        $criteria->mergeWith($filtroStr1, 'AND');

        if (in_array($filtros[WsParameters::F_CANT_BANIOS], array(1, 2, 3))) {
            $criteriaCantBanios = new CDbCriteria;
            if (in_array($filtros[WsParameters::F_CANT_BANIOS], array(1, 2))) {
                $criteriaCantBanios->addCondition('cant_banios = :cantidadBanios');
            } else {
                $criteriaCantBanios->addCondition('cant_banios >= :cantidadBanios');
            }

            $criteriaCantBanios->params = array(
                ':cantidadBanios' => $filtros[WsParameters::F_CANT_BANIOS]
            );
            $criteria->mergeWith($criteriaCantBanios, 'AND');
        }

        if (in_array($filtros[WsParameters::F_CANT_HABITACIONES], array(1, 2, 3, 4))) {
            $criteriaCantHabitaciones = new CDbCriteria;
            if (in_array($filtros[WsParameters::F_CANT_HABITACIONES], array(1, 2, 3, 4))) {
                $criteriaCantHabitaciones->addCondition('cant_dormitorios = :cantidadHabitaciones');
            } else {
                $criteriaCantHabitaciones->addCondition('cant_dormitorios >= :cantidadHabitaciones');
            }

            $criteriaCantHabitaciones->params = array(
                ':cantidadHabitaciones' => $filtros[WsParameters::F_CANT_HABITACIONES]
            );
            $criteria->mergeWith($criteriaCantHabitaciones, 'AND');
        }

        $criteriaPrecioDesde = new CDbCriteria;
        if ($filtros[WsParameters::F_PRECIO_DESDE] > 0) {
            $criteriaPrecioDesde->addCondition('precio_publicacion >= :precioDesde');
            $criteriaPrecioDesde->params = array(
                ':precioDesde' => $filtros[WsParameters::F_PRECIO_DESDE]
            );
            $criteria->mergeWith($criteriaPrecioDesde, 'AND');
        }

        $criteriaPrecioHasta = new CDbCriteria;
        if ($filtros[WsParameters::F_PRECIO_HASTA] > 0) {
            $criteriaPrecioHasta->addCondition('precio_publicacion <= :precioHasta');
            $criteriaPrecioHasta->params = array(
                ':precioHasta' => $filtros[WsParameters::F_PRECIO_HASTA]
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
        return CHtml::listData(EstadoInmueble::model()->findAll(), 'id', 'nombre');
    }

    public function findDestacados() {
        $destacados = DestacadoInmueble::model()->findAll(
                array('order' => 'id')
        );

        $inmuebles = array();
        foreach ($destacados as $dest) {
            array_push($inmuebles, Inmueble::model()->findByPk($dest->id_inmueble));
        }

        return $inmuebles;
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
            $imgArr["titulo"] = "";
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
                ->select('tipo_inmueble, COUNT(*) as count')
                ->from('inmuebles')
                ->group('tipo_inmueble')
                ->queryAll();
        return $data;
    }

    public function countByEstado() {
        $data = Yii::app()->db->createCommand()
                ->select('e.nombre as estado_inmueble, COUNT(*) as count')
                ->from('inmuebles i,estados_inmueble e')
                ->where('i.fk_estado = e.id')
                ->group('e.nombre')
                ->queryAll();
        return $data;
    }

    public function countByBarrio() {
        $sql = "select e.nombre as barrio_inmueble, count(*) as count
            from inmuebles i left join barrios e on i.id_barrio = e.id
            group by e.nombre;";
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
                ->from('inmuebles')
                ->queryAll();
        return $data[0]["count"];
    }
    
    public function deleteAllImages(){
        ImagenInmueble::model()->deleteAll('id_inmueble = :idInmueble', array('idInmueble' => $this->id));
    }

}
