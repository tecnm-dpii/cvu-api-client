<?php

namespace TecNM_DPII\CVU_API_Client;

class TnmCvuApiScopes
{
    /* BASIC LOGIN INFO */
    public const INFO_LOGIN = 'https://api.cvu.acad-tecnm.mx/auth/cvu/login';

    public const OFFLINE_ACCESS = 'https://api.cvu.acad-tecnm.mx/auth/cvu/offline';

    /* INFORMACION DE PERFIL DE USUARIO */
    public const DATOS_PERSONALES = 'https://api.cvu.acad-tecnm.mx/auth/cvu/perfil/personal';
    public const IMAGEN_PERFIL = 'https://api.cvu.acad-tecnm.mx/auth/cvu/perfil/imagen';

    /* DATOS DE CONTACTO */
    public const INFO_CONTACTO = 'https://api.cvu.acad-tecnm.mx/auth/cvu/contacto';
    public const INFO_TELEFONO = 'https://api.cvu.acad-tecnm.mx/auth/cvu/contacto/telefono';
    public const INFO_EMAIL = 'https://api.cvu.acad-tecnm.mx/auth/cvu/contacto/email';

    /* ACCESO A DATOS LABORALES */
    public const DATOS_LABORALES = 'https://api.cvu.acad-tecnm.mx/auth/cvu/datos-laborales';
    public const ADSCRIPCION_TECNM = 'https://api.cvu.acad-tecnm.mx/auth/cvu/datos-laborales/tecnm';
    public const OTROS_CARGOS = 'https://api.cvu.acad-tecnm.mx/auth/cvu/datos-laborales/otros';

    /* DATOS DE FORMACION ACADEMICA */
    public const FORMACION_ACADEMICA = 'https://api.cvu.acad-tecnm.mx/auth/cvu/formacion-academica';

    /* PERFIL PRODEP DEL USUARIO */
    public const PERFIL_PRODEP = 'https://api.cvu.acad-tecnm.mx/auth/cvu/prodep';
    public const REGISTRO_PRODEP = 'https://api.cvu.acad-tecnm.mx/auth/cvu/prodep/registro';
    public const PERFIL_DESEABLE_PRODEP = 'https://api.cvu.acad-tecnm.mx/auth/cvu/prodep/perfil-deseable';
    public const CUERPOS_ACADEMICOS = 'https://api.cvu.acad-tecnm.mx/auth/cvu/prodep/cuerpos-academicos';

    /* PERFIL CONACYT DEL USUARIO */
    public const PERFIL_CONACYT = 'https://api.cvu.acad-tecnm.mx/auth/cvu/conacyt';
    public const CVU_CONACYT = 'https://api.cvu.acad-tecnm.mx/auth/cvu/conacyt/registro';
    public const NIVEL_SNI = 'https://api.cvu.acad-tecnm.mx/auth/cvu/conacyt/sni';

    /* PRODUCTIVIDAD ACADEMICA DEL USUARIO */
    public const PRODUCTIVIDAD_ACADEMICA = 'https://api.cvu.acad-tecnm.mx/auth/cvu/productividad';
    public const ESTANCIAS_ACADEMICAS = 'https://api.cvu.acad-tecnm.mx/auth/cvu/productividad/estancias';
    public const PRODUCTOS_INVESTIGACION = 'https://api.cvu.acad-tecnm.mx/auth/cvu/productividad/investigacion';

    /* DISTINCIONES */
    public const DISTINCIONES = 'https://api.cvu.acad-tecnm.mx/auth/cvu/distinciones';
    public const CERTIFICACIONES = 'https://api.cvu.acad-tecnm.mx/auth/cvu/distinciones/certificaciones';
    public const PREMIOS = 'https://api.cvu.acad-tecnm.mx/auth/cvu/distinciones/premios';
    public const COLEGIOS = 'https://api.cvu.acad-tecnm.mx/auth/cvu/distinciones/colegios';
    public const TECNM_EDD = 'https://api.cvu.acad-tecnm.mx/auth/cvu/distinciones/tecnm-edd';
    public const TECNM_EDD_WRITE = 'https://api.cvu.acad-tecnm.mx/auth/cvu/distinciones/tecnm-edd.write';

    /* ASOCIACIONES */
    public const ASOCIACIONES = 'https://api.cvu.acad-tecnm.mx/auth/cvu/asociaciones';

    /* ARCHIVOS Y EVIDENCIAS */
    public const FILES = 'https://api.cvu.acad-tecnm.mx/auth/cvu/files';
}
