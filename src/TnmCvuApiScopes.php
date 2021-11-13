<?php

namespace TecNM_DPII\CVU_API_Client;

class TnmCvuApiScopes
{
    /* BASIC LOGIN INFO */
    const INFO_LOGIN = 'https://api.cvu.acad-tecnm.mx/auth/cvu/login';

    const OFFLINE_ACCESS = 'https://api.cvu.acad-tecnm.mx/auth/cvu/offline';

    /* INFORMACION DE PERFIL DE USUARIO */
    const DATOS_PERSONALES = 'https://api.cvu.acad-tecnm.mx/auth/cvu/perfil/personal';
    const IMAGEN_PERFIL = 'https://api.cvu.acad-tecnm.mx/auth/cvu/perfil/imagen';

    /* DATOS DE CONTACTO */
    const INFO_CONTACTO = 'https://api.cvu.acad-tecnm.mx/auth/cvu/contacto';
    const INFO_TELEFONO = 'https://api.cvu.acad-tecnm.mx/auth/cvu/contacto/telefono';
    const INFO_EMAIL = 'https://api.cvu.acad-tecnm.mx/auth/cvu/contacto/email';

    /* ACCESO A DATOS LABORALES */
    const DATOS_LABORALES = 'https://api.cvu.acad-tecnm.mx/auth/cvu/datos-laborales';
    const ADSCRIPCION_TECNM = 'https://api.cvu.acad-tecnm.mx/auth/cvu/datos-laborales/tecnm';
    const OTROS_CARGOS = 'https://api.cvu.acad-tecnm.mx/auth/cvu/datos-laborales/otros';

    /* DATOS DE FORMACION ACADEMICA */
    const FORMACION_ACADEMICA = 'https://api.cvu.acad-tecnm.mx/auth/cvu/formacion-academica';

    /* PERFIL PRODEP DEL USUARIO */
    const PERFIL_PRODEP = 'https://api.cvu.acad-tecnm.mx/auth/cvu/prodep';
    const REGISTRO_PRODEP = 'https://api.cvu.acad-tecnm.mx/auth/cvu/prodep/registro';
    const PERFIL_DESEABLE_PRODEP = 'https://api.cvu.acad-tecnm.mx/auth/cvu/prodep/perfil-deseable';
    const CUERPOS_ACADEMICOS = 'https://api.cvu.acad-tecnm.mx/auth/cvu/prodep/cuerpos-academicos';

    /* PERFIL CONACYT DEL USUARIO */
    const PERFIL_CONACYT = 'https://api.cvu.acad-tecnm.mx/auth/cvu/conacyt';
    const CVU_CONACYT = 'https://api.cvu.acad-tecnm.mx/auth/cvu/conacyt/registro';
    const NIVEL_SNI = 'https://api.cvu.acad-tecnm.mx/auth/cvu/conacyt/sni';

    /* PRODUCTIVIDAD ACADEMICA DEL USUARIO */
    const PRODUCTIVIDAD_ACADEMICA = 'https://api.cvu.acad-tecnm.mx/auth/cvu/productividad';
    const ESTANCIAS_ACADEMICAS = 'https://api.cvu.acad-tecnm.mx/auth/cvu/productividad/estancias';
    const PRODUCTOS_INVESTIGACION = 'https://api.cvu.acad-tecnm.mx/auth/cvu/productividad/investigacion';

    /* DISTINCIONES */
    const DISTINCIONES = 'https://api.cvu.acad-tecnm.mx/auth/cvu/distinciones';
    const CERTIFICACIONES = 'https://api.cvu.acad-tecnm.mx/auth/cvu/distinciones/certificaciones';
    const PREMIOS = 'https://api.cvu.acad-tecnm.mx/auth/cvu/distinciones/premios';
    const COLEGIOS = 'https://api.cvu.acad-tecnm.mx/auth/cvu/distinciones/colegios';
    const TECNM_EDD = 'https://api.cvu.acad-tecnm.mx/auth/cvu/distinciones/tecnm-edd';
    const TECNM_EDD_WRITE = 'https://api.cvu.acad-tecnm.mx/auth/cvu/distinciones/tecnm-edd.write';

    /* ASOCIACIONES */
    const ASOCIACIONES = 'https://api.cvu.acad-tecnm.mx/auth/cvu/asociaciones';

    /* ARCHIVOS Y EVIDENCIAS */
    const FILES = 'https://api.cvu.acad-tecnm.mx/auth/cvu/files';
}
