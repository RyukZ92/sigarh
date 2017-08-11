--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: asignatura; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE asignatura (
    codigo character varying(10) NOT NULL,
    nombre character varying(30) NOT NULL,
    id_semestre integer NOT NULL
);


ALTER TABLE public.asignatura OWNER TO postgres;

--
-- Name: calificacion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE calificacion (
    id integer NOT NULL,
    dni_estudiante integer NOT NULL,
    id_inscripcion integer NOT NULL,
    codigo_asignatura character varying(15) NOT NULL
);


ALTER TABLE public.calificacion OWNER TO postgres;

--
-- Name: calificacion_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE calificacion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.calificacion_id_seq OWNER TO postgres;

--
-- Name: calificacion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE calificacion_id_seq OWNED BY calificacion.id;


--
-- Name: ciudad; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE ciudad (
    id integer NOT NULL,
    ciudad character varying(50) NOT NULL,
    id_estado integer NOT NULL
);


ALTER TABLE public.ciudad OWNER TO postgres;

--
-- Name: ciudad_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE ciudad_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ciudad_id_seq OWNER TO postgres;

--
-- Name: ciudad_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE ciudad_id_seq OWNED BY ciudad.id;


--
-- Name: datos_personales; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE datos_personales (
    dni integer NOT NULL,
    tipo_dni character(1) NOT NULL,
    nombre character varying(40) NOT NULL,
    apellido character varying(40) NOT NULL,
    fecha_natal date NOT NULL,
    sexo character(9) NOT NULL,
    eliminado character(1) DEFAULT 0,
    direccion character varying(50),
    lugar_nacimiento character varying(50)
);


ALTER TABLE public.datos_personales OWNER TO postgres;

--
-- Name: docente; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE docente (
    dni integer NOT NULL,
    cargo character varying(50)
);


ALTER TABLE public.docente OWNER TO postgres;

--
-- Name: docente_asignatura; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE docente_asignatura (
    id integer NOT NULL,
    dni_docente integer NOT NULL,
    id_horario_asignatura integer NOT NULL
);


ALTER TABLE public.docente_asignatura OWNER TO postgres;

--
-- Name: docente_asignatura_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE docente_asignatura_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.docente_asignatura_id_seq OWNER TO postgres;

--
-- Name: docente_asignatura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE docente_asignatura_id_seq OWNED BY docente_asignatura.id;


--
-- Name: estado; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE estado (
    id integer NOT NULL,
    estado character varying(50) NOT NULL
);


ALTER TABLE public.estado OWNER TO postgres;

--
-- Name: estado_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE estado_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estado_id_seq OWNER TO postgres;

--
-- Name: estado_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE estado_id_seq OWNED BY estado.id;


--
-- Name: estudiante; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE estudiante (
    dni integer NOT NULL,
    telefono character varying(12),
    id_estado integer
);


ALTER TABLE public.estudiante OWNER TO postgres;

--
-- Name: historial; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE historial (
    id integer NOT NULL,
    fecha date DEFAULT now() NOT NULL,
    hora time without time zone DEFAULT now() NOT NULL,
    accion text NOT NULL,
    usuario character varying(20) NOT NULL
);


ALTER TABLE public.historial OWNER TO postgres;

--
-- Name: historial_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE historial_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.historial_id_seq OWNER TO postgres;

--
-- Name: historial_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE historial_id_seq OWNED BY historial.id;


--
-- Name: horario_asignatura; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE horario_asignatura (
    id integer NOT NULL,
    codigo_asignatura character varying(15) NOT NULL,
    codigo_seccion character varying(15),
    cupos integer NOT NULL,
    periodo_academico character varying(20)
);


ALTER TABLE public.horario_asignatura OWNER TO postgres;

--
-- Name: horario_asignatura_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE horario_asignatura_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.horario_asignatura_id_seq OWNER TO postgres;

--
-- Name: horario_asignatura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE horario_asignatura_id_seq OWNED BY horario_asignatura.id;


--
-- Name: horas_asignatura; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE horas_asignatura (
    id integer NOT NULL,
    dia character(1) NOT NULL,
    hora_inicio time without time zone NOT NULL,
    hora_salida time without time zone NOT NULL,
    id_horario_asignatura integer NOT NULL,
    aula character varying(15)
);


ALTER TABLE public.horas_asignatura OWNER TO postgres;

--
-- Name: horas_asignatura_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE horas_asignatura_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.horas_asignatura_id_seq OWNER TO postgres;

--
-- Name: horas_asignatura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE horas_asignatura_id_seq OWNED BY horas_asignatura.id;


--
-- Name: inscripcion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inscripcion (
    id integer NOT NULL,
    dni_estudiante integer NOT NULL,
    dni_responsable integer NOT NULL,
    fecha_inscripcion date DEFAULT now(),
    periodo_academico character varying(12) NOT NULL
);


ALTER TABLE public.inscripcion OWNER TO postgres;

--
-- Name: inscripcion_asignatura; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inscripcion_asignatura (
    id integer NOT NULL,
    id_inscripcion integer NOT NULL,
    id_horario_asignatura integer NOT NULL
);


ALTER TABLE public.inscripcion_asignatura OWNER TO postgres;

--
-- Name: inscripcion_asignatura_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inscripcion_asignatura_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inscripcion_asignatura_id_seq OWNER TO postgres;

--
-- Name: inscripcion_asignatura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inscripcion_asignatura_id_seq OWNED BY inscripcion_asignatura.id;


--
-- Name: inscripcion_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inscripcion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inscripcion_id_seq OWNER TO postgres;

--
-- Name: inscripcion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inscripcion_id_seq OWNED BY inscripcion.id;


--
-- Name: institucion_escolar; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE institucion_escolar (
    id integer NOT NULL,
    nombre character varying(100) NOT NULL,
    id_ciudad integer NOT NULL,
    estatus character(1) DEFAULT 0
);


ALTER TABLE public.institucion_escolar OWNER TO postgres;

--
-- Name: institucion_escolar_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE institucion_escolar_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.institucion_escolar_id_seq OWNER TO postgres;

--
-- Name: institucion_escolar_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE institucion_escolar_id_seq OWNED BY institucion_escolar.id;


--
-- Name: municipio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE municipio (
    id integer NOT NULL,
    municipio character varying(80) NOT NULL,
    id_municipio integer NOT NULL
);


ALTER TABLE public.municipio OWNER TO postgres;

--
-- Name: municipio_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE municipio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.municipio_id_seq OWNER TO postgres;

--
-- Name: municipio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE municipio_id_seq OWNED BY municipio.id;


--
-- Name: nota; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE nota (
    id integer NOT NULL,
    nota numeric(5,2) NOT NULL,
    id_calificacion integer NOT NULL
);


ALTER TABLE public.nota OWNER TO postgres;

--
-- Name: nota_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE nota_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nota_id_seq OWNER TO postgres;

--
-- Name: nota_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE nota_id_seq OWNED BY nota.id;


--
-- Name: periodo_academico; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE periodo_academico (
    id integer NOT NULL,
    periodo_academico character varying(10) NOT NULL,
    estatus character(1) DEFAULT 1,
    fecha_registro date DEFAULT now(),
    fecha_desde date,
    fecha_hasta date,
    fecha_cierre date,
    periodo_nota character(1) DEFAULT 1
);


ALTER TABLE public.periodo_academico OWNER TO postgres;

--
-- Name: periodo_academico_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE periodo_academico_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.periodo_academico_id_seq OWNER TO postgres;

--
-- Name: periodo_academico_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE periodo_academico_id_seq OWNED BY periodo_academico.id;


--
-- Name: record_academico; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE record_academico (
    id integer NOT NULL,
    dni_estudiante integer NOT NULL,
    nota numeric(5,2),
    codigo_asignatura character varying(15),
    periodo_academico character varying(15),
    tipo character varying(10),
    fecha date,
    id_institucion integer NOT NULL
);


ALTER TABLE public.record_academico OWNER TO postgres;

--
-- Name: record_academico_id_institucion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE record_academico_id_institucion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.record_academico_id_institucion_seq OWNER TO postgres;

--
-- Name: record_academico_id_institucion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE record_academico_id_institucion_seq OWNED BY record_academico.id_institucion;


--
-- Name: record_academico_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE record_academico_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.record_academico_id_seq OWNER TO postgres;

--
-- Name: record_academico_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE record_academico_id_seq OWNED BY record_academico.id;


--
-- Name: seccion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE seccion (
    codigo character varying(10) NOT NULL,
    id_semestre integer NOT NULL,
    estatus character(1) DEFAULT 1 NOT NULL
);


ALTER TABLE public.seccion OWNER TO postgres;

--
-- Name: secretariado; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE secretariado (
    dni integer NOT NULL,
    cargo character varying(50),
    telefono character varying(12)
);


ALTER TABLE public.secretariado OWNER TO postgres;

--
-- Name: semestre; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE semestre (
    id integer NOT NULL,
    nombre character varying(15) NOT NULL,
    anio_escolar integer
);


ALTER TABLE public.semestre OWNER TO postgres;

--
-- Name: semestre_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE semestre_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.semestre_id_seq OWNER TO postgres;

--
-- Name: semestre_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE semestre_id_seq OWNED BY semestre.id;


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuario (
    usuario character varying(20) NOT NULL,
    contrasenia character varying(32),
    email character varying(50) NOT NULL,
    tipo_usuario character varying(15) NOT NULL,
    fecha_creacion date DEFAULT now(),
    eliminado character(1) DEFAULT 0,
    dni_persona integer NOT NULL,
    pregunta_secreta character varying(40),
    respuesta_secreta character varying(32)
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY calificacion ALTER COLUMN id SET DEFAULT nextval('calificacion_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ciudad ALTER COLUMN id SET DEFAULT nextval('ciudad_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY docente_asignatura ALTER COLUMN id SET DEFAULT nextval('docente_asignatura_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estado ALTER COLUMN id SET DEFAULT nextval('estado_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY historial ALTER COLUMN id SET DEFAULT nextval('historial_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY horario_asignatura ALTER COLUMN id SET DEFAULT nextval('horario_asignatura_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY horas_asignatura ALTER COLUMN id SET DEFAULT nextval('horas_asignatura_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inscripcion ALTER COLUMN id SET DEFAULT nextval('inscripcion_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inscripcion_asignatura ALTER COLUMN id SET DEFAULT nextval('inscripcion_asignatura_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY institucion_escolar ALTER COLUMN id SET DEFAULT nextval('institucion_escolar_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY municipio ALTER COLUMN id SET DEFAULT nextval('municipio_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY nota ALTER COLUMN id SET DEFAULT nextval('nota_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY periodo_academico ALTER COLUMN id SET DEFAULT nextval('periodo_academico_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY record_academico ALTER COLUMN id SET DEFAULT nextval('record_academico_id_seq'::regclass);


--
-- Name: id_institucion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY record_academico ALTER COLUMN id_institucion SET DEFAULT nextval('record_academico_id_institucion_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY semestre ALTER COLUMN id SET DEFAULT nextval('semestre_id_seq'::regclass);


--
-- Data for Name: asignatura; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO asignatura VALUES ('CASTLIT1', 'Castellano y Literatura I', 1);
INSERT INTO asignatura VALUES ('HISVEN1', 'Historia de Venezuela I', 1);
INSERT INTO asignatura VALUES ('CONT1', 'Contabilidad I', 1);
INSERT INTO asignatura VALUES ('CASTLIT2', 'Castellano y Literatura II', 2);
INSERT INTO asignatura VALUES ('HISVEN2', 'Historia de Venezuela II', 2);
INSERT INTO asignatura VALUES ('CONT2', 'Contabilidad II', 2);
INSERT INTO asignatura VALUES ('CASTLIT3', 'Castellano y Literatura III', 3);
INSERT INTO asignatura VALUES ('CONT3', 'Contabilidad III', 3);
INSERT INTO asignatura VALUES ('CONT4', 'Contabilidad IV', 4);
INSERT INTO asignatura VALUES ('ETICVAL', 'Ética y Valores', 1);
INSERT INTO asignatura VALUES ('ADMEMP', 'Administración de Empresas', 6);
INSERT INTO asignatura VALUES ('INGL2', 'Inglés', 2);
INSERT INTO asignatura VALUES ('ESTAD', 'Estadística', 4);
INSERT INTO asignatura VALUES ('EDUCAMB', 'Educación Ambiental', 1);
INSERT INTO asignatura VALUES ('INGL1', 'Inglés', 1);
INSERT INTO asignatura VALUES ('INTINF1', 'Informática I', 1);
INSERT INTO asignatura VALUES ('INSTPRE1', 'Instrucción Premilitar', 1);
INSERT INTO asignatura VALUES ('MATE1', 'Matemáticas I', 1);
INSERT INTO asignatura VALUES ('MECANO', 'Mecanografía', 1);
INSERT INTO asignatura VALUES ('GEOVEN1', 'Geografía de Venezuela I', 2);
INSERT INTO asignatura VALUES ('INTDERE', 'Instroducción a Derecho', 2);
INSERT INTO asignatura VALUES ('INGL4', 'Inglés IV', 4);
INSERT INTO asignatura VALUES ('PRAOFIC2', 'Práctica de Oficina II', 4);
INSERT INTO asignatura VALUES ('INSTPRE4', 'Instrucción Premilitar IV', 4);
INSERT INTO asignatura VALUES ('MATEFIN', 'Matemática Financiera', 4);
INSERT INTO asignatura VALUES ('INGL3', 'Inglés III', 3);
INSERT INTO asignatura VALUES ('INSTPRE3', 'Instrucción Premilitar III', 3);
INSERT INTO asignatura VALUES ('PRAOFIC1', 'Práctica de Oficina I', 3);
INSERT INTO asignatura VALUES ('INTINF2', 'Informática II', 3);
INSERT INTO asignatura VALUES ('GEOVEN2', 'Geografía de Venezuela II', 3);
INSERT INTO asignatura VALUES ('MATE2', 'Matemáticas II', 2);
INSERT INTO asignatura VALUES ('INSTPRE2', 'Instrucción Premilitar II', 2);
INSERT INTO asignatura VALUES ('AUDIT', 'Auditoría', 6);
INSERT INTO asignatura VALUES ('PASANT', 'Pasantías', 6);
INSERT INTO asignatura VALUES ('CAST9', 'Castellano', 9);
INSERT INTO asignatura VALUES ('CAST12', 'Castellano', 12);
INSERT INTO asignatura VALUES ('CAST7', 'Castellano', 7);
INSERT INTO asignatura VALUES ('MAT7', 'Matemática', 7);
INSERT INTO asignatura VALUES ('GEO7', 'Geografía', 7);
INSERT INTO asignatura VALUES ('BIOL7', 'Biología', 7);
INSERT INTO asignatura VALUES ('ING7', 'Inglés', 7);
INSERT INTO asignatura VALUES ('GEO8', 'Geografía', 8);
INSERT INTO asignatura VALUES ('BIO8', 'Biología', 8);
INSERT INTO asignatura VALUES ('EDUCF8', 'Educación Familiar', 8);
INSERT INTO asignatura VALUES ('BIO10', 'Biologías', 10);
INSERT INTO asignatura VALUES ('EArt10', 'Educación Arstística', 10);
INSERT INTO asignatura VALUES ('HUni11', 'Historia Universal', 11);
INSERT INTO asignatura VALUES ('BIO11', 'Biologías', 11);
INSERT INTO asignatura VALUES ('EDUCF11', 'Educación Familiar', 11);
INSERT INTO asignatura VALUES ('FISC11', 'Física', 11);
INSERT INTO asignatura VALUES ('ING12', 'Inglés', 12);
INSERT INTO asignatura VALUES ('EDUCF12', 'Educación Familiar', 12);
INSERT INTO asignatura VALUES ('FISC12', 'Física', 12);
INSERT INTO asignatura VALUES ('MAT8', 'Matemáticas', 8);
INSERT INTO asignatura VALUES ('ING8', 'Inglés', 8);
INSERT INTO asignatura VALUES ('MAT9', 'Matemáticas', 9);
INSERT INTO asignatura VALUES ('ING10', 'Inglés', 10);
INSERT INTO asignatura VALUES ('HVEN10', 'Historia de Venezuela', 10);
INSERT INTO asignatura VALUES ('QUIM11', 'Química', 11);
INSERT INTO asignatura VALUES ('ING11', 'Inglés', 11);
INSERT INTO asignatura VALUES ('CAST11', 'Castellano', 11);
INSERT INTO asignatura VALUES ('MAT11', 'Matemáticas', 11);
INSERT INTO asignatura VALUES ('BIO12', 'Biologías', 12);
INSERT INTO asignatura VALUES ('HUNI12', 'Historia Universal', 12);
INSERT INTO asignatura VALUES ('QUIM12', 'Química', 12);
INSERT INTO asignatura VALUES ('MAT12', 'Matemáticas', 12);


--
-- Data for Name: calificacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO calificacion VALUES (82, 24281291, 1, 'BIOL7');
INSERT INTO calificacion VALUES (83, 24281291, 1, 'GEO7');
INSERT INTO calificacion VALUES (84, 24625158, 2, 'GEO7');
INSERT INTO calificacion VALUES (85, 26646905, 3, 'ESTAD');
INSERT INTO calificacion VALUES (86, 12345678, 4, 'GEO7');
INSERT INTO calificacion VALUES (87, 12345678, 4, 'ING7');
INSERT INTO calificacion VALUES (88, 12345678, 4, 'MAT7');
INSERT INTO calificacion VALUES (124, 24281293, 12, 'BIOL7');
INSERT INTO calificacion VALUES (125, 24281293, 12, 'CAST7');
INSERT INTO calificacion VALUES (126, 24281293, 12, 'GEO7');
INSERT INTO calificacion VALUES (127, 24281293, 12, 'ING7');
INSERT INTO calificacion VALUES (128, 24281293, 12, 'MAT7');
INSERT INTO calificacion VALUES (129, 25896355, 13, 'ESTAD');
INSERT INTO calificacion VALUES (130, 25896355, 13, 'CAST9');
INSERT INTO calificacion VALUES (131, 25896355, 13, 'MAT9');


--
-- Name: calificacion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('calificacion_id_seq', 131, true);


--
-- Data for Name: ciudad; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO ciudad VALUES (1, 'Caracas', 1);
INSERT INTO ciudad VALUES (2, 'La Esmeralda', 2);
INSERT INTO ciudad VALUES (3, 'San Fernando de Atabapo', 2);
INSERT INTO ciudad VALUES (4, 'Puerto Ayacucho', 2);
INSERT INTO ciudad VALUES (5, 'Isla Ratón', 2);
INSERT INTO ciudad VALUES (6, 'San Juan de Manapiare', 2);
INSERT INTO ciudad VALUES (7, 'Maroa', 2);
INSERT INTO ciudad VALUES (8, 'San Carlos de Río Negro', 2);
INSERT INTO ciudad VALUES (9, 'Anaco', 3);
INSERT INTO ciudad VALUES (10, 'Aragua de Barcelona', 3);
INSERT INTO ciudad VALUES (11, 'Clarines', 3);
INSERT INTO ciudad VALUES (12, 'Lechería', 3);
INSERT INTO ciudad VALUES (13, 'Puerto Píritu', 3);
INSERT INTO ciudad VALUES (14, 'Valle de Guanape', 3);
INSERT INTO ciudad VALUES (15, 'El Chaparro', 3);
INSERT INTO ciudad VALUES (16, 'Guanta', 3);
INSERT INTO ciudad VALUES (17, 'Soledad', 3);
INSERT INTO ciudad VALUES (18, 'Mapire', 3);
INSERT INTO ciudad VALUES (19, 'Puerto La Cruz', 3);
INSERT INTO ciudad VALUES (20, 'Onoto', 3);
INSERT INTO ciudad VALUES (21, 'San Mateo', 3);
INSERT INTO ciudad VALUES (22, 'Pariaguán', 3);
INSERT INTO ciudad VALUES (23, 'Cantaura', 3);
INSERT INTO ciudad VALUES (24, 'Píritu', 3);
INSERT INTO ciudad VALUES (25, 'San José de Guanipa', 3);
INSERT INTO ciudad VALUES (26, 'Boca de Uchire', 3);
INSERT INTO ciudad VALUES (27, 'Santa Ana', 3);
INSERT INTO ciudad VALUES (28, 'Barcelona', 3);
INSERT INTO ciudad VALUES (29, 'El Tigre', 3);
INSERT INTO ciudad VALUES (30, 'Achaguas', 4);
INSERT INTO ciudad VALUES (31, 'Biruaca', 4);
INSERT INTO ciudad VALUES (32, 'Bruzual', 4);
INSERT INTO ciudad VALUES (33, 'Guasdualito', 4);
INSERT INTO ciudad VALUES (34, 'San Juan de Payara', 4);
INSERT INTO ciudad VALUES (35, 'Elorza', 4);
INSERT INTO ciudad VALUES (36, 'San Fernando de Apure', 4);
INSERT INTO ciudad VALUES (37, 'Maracay', 5);
INSERT INTO ciudad VALUES (38, 'San Mateo', 5);
INSERT INTO ciudad VALUES (39, 'Camatagua', 5);
INSERT INTO ciudad VALUES (40, 'Santa Rita', 5);
INSERT INTO ciudad VALUES (41, 'Santa Cruz de Aragua', 5);
INSERT INTO ciudad VALUES (42, 'La Victoria', 5);
INSERT INTO ciudad VALUES (43, 'El Consejo', 5);
INSERT INTO ciudad VALUES (44, 'Palo Negro', 5);
INSERT INTO ciudad VALUES (45, 'El Limón', 5);
INSERT INTO ciudad VALUES (46, 'Ocumare de la Costa', 5);
INSERT INTO ciudad VALUES (47, 'San Casimiro', 5);
INSERT INTO ciudad VALUES (48, 'San Sebastián de Los Reyes', 5);
INSERT INTO ciudad VALUES (49, 'Turmero', 5);
INSERT INTO ciudad VALUES (50, 'Las Tejerías', 5);
INSERT INTO ciudad VALUES (51, 'Cagua', 5);
INSERT INTO ciudad VALUES (52, 'Colonia Tovar', 5);
INSERT INTO ciudad VALUES (53, 'Barbacoas', 5);
INSERT INTO ciudad VALUES (54, 'Villa de Cura', 5);
INSERT INTO ciudad VALUES (55, 'Sabaneta', 6);
INSERT INTO ciudad VALUES (56, 'El Cantón', 6);
INSERT INTO ciudad VALUES (57, 'Socopó', 6);
INSERT INTO ciudad VALUES (58, 'Arismendi', 6);
INSERT INTO ciudad VALUES (59, 'Barinas', 6);
INSERT INTO ciudad VALUES (60, 'Barinitas', 6);
INSERT INTO ciudad VALUES (61, 'Barrancas', 6);
INSERT INTO ciudad VALUES (62, 'Santa Bárbara', 6);
INSERT INTO ciudad VALUES (63, 'Obispos', 6);
INSERT INTO ciudad VALUES (64, 'Ciudad Bolivia', 6);
INSERT INTO ciudad VALUES (65, 'Libertad', 6);
INSERT INTO ciudad VALUES (66, 'Ciudad de Nutrias', 6);
INSERT INTO ciudad VALUES (67, 'Ciudad Guayana', 7);
INSERT INTO ciudad VALUES (68, 'Caicara del Orinoco', 7);
INSERT INTO ciudad VALUES (69, 'El Callao', 7);
INSERT INTO ciudad VALUES (70, 'Santa Elena de Uairén', 7);
INSERT INTO ciudad VALUES (71, 'Ciudad Bolívar', 7);
INSERT INTO ciudad VALUES (72, 'Upata', 7);
INSERT INTO ciudad VALUES (73, 'Ciudad Piar', 7);
INSERT INTO ciudad VALUES (74, 'Guasipati', 7);
INSERT INTO ciudad VALUES (75, 'El Dorado', 7);
INSERT INTO ciudad VALUES (76, 'Maripa', 7);
INSERT INTO ciudad VALUES (77, 'El Palmar', 7);
INSERT INTO ciudad VALUES (78, 'Bejuma', 8);
INSERT INTO ciudad VALUES (79, 'Güigüe', 8);
INSERT INTO ciudad VALUES (80, 'Mariara', 8);
INSERT INTO ciudad VALUES (81, 'Guacara', 8);
INSERT INTO ciudad VALUES (82, 'Morón', 8);
INSERT INTO ciudad VALUES (83, 'Tocuyito', 8);
INSERT INTO ciudad VALUES (84, 'Los Guayos', 8);
INSERT INTO ciudad VALUES (85, 'Miranda', 8);
INSERT INTO ciudad VALUES (86, 'Montalbán', 8);
INSERT INTO ciudad VALUES (87, 'Naguanagua', 8);
INSERT INTO ciudad VALUES (88, 'Puerto Cabello', 8);
INSERT INTO ciudad VALUES (89, 'San Diego', 8);
INSERT INTO ciudad VALUES (90, 'San Joaquín', 8);
INSERT INTO ciudad VALUES (91, 'Valencia', 8);
INSERT INTO ciudad VALUES (92, 'Cojedes', 9);
INSERT INTO ciudad VALUES (93, 'Tinaquillo', 9);
INSERT INTO ciudad VALUES (94, 'El Baúl', 9);
INSERT INTO ciudad VALUES (95, 'Macapo', 9);
INSERT INTO ciudad VALUES (96, 'El Pao', 9);
INSERT INTO ciudad VALUES (97, 'Libertad', 9);
INSERT INTO ciudad VALUES (98, 'Las Vegas', 9);
INSERT INTO ciudad VALUES (99, 'San Carlos', 9);
INSERT INTO ciudad VALUES (100, 'Tinaco', 9);
INSERT INTO ciudad VALUES (101, 'Curiapo', 10);
INSERT INTO ciudad VALUES (102, 'Sierra Imataca', 10);
INSERT INTO ciudad VALUES (103, 'Pedernales', 10);
INSERT INTO ciudad VALUES (104, 'Tucupita', 10);
INSERT INTO ciudad VALUES (105, 'San Juan de los Cayos', 11);
INSERT INTO ciudad VALUES (106, 'San Luis', 11);
INSERT INTO ciudad VALUES (107, 'Capatárida', 11);
INSERT INTO ciudad VALUES (108, 'Yaracal', 11);
INSERT INTO ciudad VALUES (109, 'Punto Fijo', 11);
INSERT INTO ciudad VALUES (110, 'La Vela de Coro', 11);
INSERT INTO ciudad VALUES (111, 'Dabajuro', 11);
INSERT INTO ciudad VALUES (112, 'Pedregal', 11);
INSERT INTO ciudad VALUES (113, 'Pueblo Nuevo', 11);
INSERT INTO ciudad VALUES (114, 'Churuguara', 11);
INSERT INTO ciudad VALUES (115, 'Jacura', 11);
INSERT INTO ciudad VALUES (116, 'Tucacas', 11);
INSERT INTO ciudad VALUES (117, 'Santa Cruz de Los Taques', 11);
INSERT INTO ciudad VALUES (118, 'Mene de Mauroa', 11);
INSERT INTO ciudad VALUES (119, 'Santa Ana de Coro', 11);
INSERT INTO ciudad VALUES (120, 'Chichiriviche', 11);
INSERT INTO ciudad VALUES (121, 'Palmasola', 11);
INSERT INTO ciudad VALUES (122, 'Cabure', 11);
INSERT INTO ciudad VALUES (123, 'Píritu', 11);
INSERT INTO ciudad VALUES (124, 'Mirimire', 11);
INSERT INTO ciudad VALUES (125, 'La Cruz de Taratara', 11);
INSERT INTO ciudad VALUES (126, 'Tocópero', 11);
INSERT INTO ciudad VALUES (127, 'Santa Cruz de Bucaral', 11);
INSERT INTO ciudad VALUES (128, 'Urumaco', 11);
INSERT INTO ciudad VALUES (129, 'Puerto Cumarebo', 11);
INSERT INTO ciudad VALUES (130, 'Camaguán', 12);
INSERT INTO ciudad VALUES (131, 'Chaguaramas', 12);
INSERT INTO ciudad VALUES (132, 'El Socorro', 12);
INSERT INTO ciudad VALUES (133, 'Tucupido', 12);
INSERT INTO ciudad VALUES (134, 'Altagracia de Orituco', 12);
INSERT INTO ciudad VALUES (135, 'San Juan de Los Morros', 12);
INSERT INTO ciudad VALUES (136, 'El Sombrero', 12);
INSERT INTO ciudad VALUES (137, 'Las Mercedes', 12);
INSERT INTO ciudad VALUES (138, 'Valle de La Pascua', 12);
INSERT INTO ciudad VALUES (139, 'Zaraza', 12);
INSERT INTO ciudad VALUES (140, 'Ortiz', 12);
INSERT INTO ciudad VALUES (141, 'Guayabal', 12);
INSERT INTO ciudad VALUES (142, 'San José de Guaribe', 12);
INSERT INTO ciudad VALUES (143, 'Santa María de Ipire', 12);
INSERT INTO ciudad VALUES (144, 'Calabozo', 12);
INSERT INTO ciudad VALUES (145, 'Sanare', 13);
INSERT INTO ciudad VALUES (146, 'Duaca', 13);
INSERT INTO ciudad VALUES (147, 'Barquisimeto', 13);
INSERT INTO ciudad VALUES (148, 'Quibor', 13);
INSERT INTO ciudad VALUES (149, 'El Tocuyo', 13);
INSERT INTO ciudad VALUES (150, 'Cabudare', 13);
INSERT INTO ciudad VALUES (151, 'Sarare', 13);
INSERT INTO ciudad VALUES (152, 'Carora', 13);
INSERT INTO ciudad VALUES (153, 'Siquisique', 13);
INSERT INTO ciudad VALUES (154, 'El Vigía', 14);
INSERT INTO ciudad VALUES (155, 'La Azulita', 14);
INSERT INTO ciudad VALUES (156, 'Santa Cruz de Mora', 14);
INSERT INTO ciudad VALUES (157, 'Aricagua', 14);
INSERT INTO ciudad VALUES (158, 'Canaguá', 14);
INSERT INTO ciudad VALUES (159, 'Ejido', 14);
INSERT INTO ciudad VALUES (160, 'Tucaní', 14);
INSERT INTO ciudad VALUES (161, 'Santo Domingo', 14);
INSERT INTO ciudad VALUES (162, 'Guaraque', 14);
INSERT INTO ciudad VALUES (163, 'Arapuey', 14);
INSERT INTO ciudad VALUES (164, 'Torondoy', 14);
INSERT INTO ciudad VALUES (165, 'Mérida', 14);
INSERT INTO ciudad VALUES (166, 'Timotes', 14);
INSERT INTO ciudad VALUES (167, 'Santa Elena de Arenales', 14);
INSERT INTO ciudad VALUES (168, 'Santa María de Caparo', 14);
INSERT INTO ciudad VALUES (169, 'Pueblo Llano', 14);
INSERT INTO ciudad VALUES (170, 'Mucuchíes', 14);
INSERT INTO ciudad VALUES (171, 'Bailadores', 14);
INSERT INTO ciudad VALUES (172, 'Tabay', 14);
INSERT INTO ciudad VALUES (173, 'Lagunillas', 14);
INSERT INTO ciudad VALUES (174, 'Tovar', 14);
INSERT INTO ciudad VALUES (175, 'Nueva Bolivia', 14);
INSERT INTO ciudad VALUES (176, 'Zea', 14);
INSERT INTO ciudad VALUES (177, 'Caucagua', 15);
INSERT INTO ciudad VALUES (178, 'San José de Barlovento', 15);
INSERT INTO ciudad VALUES (179, 'Baruta', 15);
INSERT INTO ciudad VALUES (180, 'Higuerote', 15);
INSERT INTO ciudad VALUES (181, 'Mamporal', 15);
INSERT INTO ciudad VALUES (182, 'Carrizal', 15);
INSERT INTO ciudad VALUES (183, 'Chacao', 15);
INSERT INTO ciudad VALUES (184, 'Charallave', 15);
INSERT INTO ciudad VALUES (185, 'Santa Rosalía de Palermo', 15);
INSERT INTO ciudad VALUES (186, 'Los Teques', 15);
INSERT INTO ciudad VALUES (187, 'Santa Teresa del Tuy', 15);
INSERT INTO ciudad VALUES (188, 'Ocumare del Tuy', 15);
INSERT INTO ciudad VALUES (189, 'San Antonio de los Altos', 15);
INSERT INTO ciudad VALUES (190, 'Río Chico', 15);
INSERT INTO ciudad VALUES (191, 'Santa Lucía', 15);
INSERT INTO ciudad VALUES (192, 'Cúpira', 15);
INSERT INTO ciudad VALUES (193, 'Guarenas', 15);
INSERT INTO ciudad VALUES (194, 'San Francisco de Yare', 15);
INSERT INTO ciudad VALUES (195, 'Petare', 15);
INSERT INTO ciudad VALUES (196, 'Cúa', 15);
INSERT INTO ciudad VALUES (197, 'Guatire', 15);
INSERT INTO ciudad VALUES (198, 'San Antonio de Capayacuar', 16);
INSERT INTO ciudad VALUES (199, 'Aguasay', 16);
INSERT INTO ciudad VALUES (200, 'Caripito', 16);
INSERT INTO ciudad VALUES (201, 'Caripe', 16);
INSERT INTO ciudad VALUES (202, 'Caicara de Maturín', 16);
INSERT INTO ciudad VALUES (203, 'Punta de Mata', 16);
INSERT INTO ciudad VALUES (204, 'Temblador', 16);
INSERT INTO ciudad VALUES (205, 'Maturín', 16);
INSERT INTO ciudad VALUES (206, 'Aragua de Maturín', 16);
INSERT INTO ciudad VALUES (207, 'Quiriquire', 16);
INSERT INTO ciudad VALUES (208, 'Santa Bárbara', 16);
INSERT INTO ciudad VALUES (209, 'Barrancas del Orinoco', 16);
INSERT INTO ciudad VALUES (210, 'Uracoa', 16);
INSERT INTO ciudad VALUES (211, 'La Plaza de Paraguachí', 17);
INSERT INTO ciudad VALUES (212, 'La Asunción', 17);
INSERT INTO ciudad VALUES (213, 'San Juan Bautista', 17);
INSERT INTO ciudad VALUES (214, 'El Valle del Espíritu Santo', 17);
INSERT INTO ciudad VALUES (215, 'Santa Ana', 17);
INSERT INTO ciudad VALUES (216, 'Pampatar', 17);
INSERT INTO ciudad VALUES (217, 'Juan Griego', 17);
INSERT INTO ciudad VALUES (218, 'Porlamar', 17);
INSERT INTO ciudad VALUES (219, 'Boca de Río', 17);
INSERT INTO ciudad VALUES (220, 'Punta de Piedras', 17);
INSERT INTO ciudad VALUES (221, 'San Pedro de Coche', 17);
INSERT INTO ciudad VALUES (222, 'Agua Blanca', 18);
INSERT INTO ciudad VALUES (223, 'Araure', 18);
INSERT INTO ciudad VALUES (224, 'Píritu', 18);
INSERT INTO ciudad VALUES (225, 'Guanare', 18);
INSERT INTO ciudad VALUES (226, 'Guanarito', 18);
INSERT INTO ciudad VALUES (227, 'Paraíso de Chabasquén', 18);
INSERT INTO ciudad VALUES (228, 'Ospino', 18);
INSERT INTO ciudad VALUES (229, 'Acarigua', 18);
INSERT INTO ciudad VALUES (230, 'Papelón', 18);
INSERT INTO ciudad VALUES (231, 'Boconoíto', 18);
INSERT INTO ciudad VALUES (232, 'San Rafael de Onoto', 18);
INSERT INTO ciudad VALUES (233, 'El Playón', 18);
INSERT INTO ciudad VALUES (234, 'Biscucuy', 18);
INSERT INTO ciudad VALUES (235, 'Villa Bruzual', 18);
INSERT INTO ciudad VALUES (236, 'Casanay', 19);
INSERT INTO ciudad VALUES (237, 'San José de Aerocuar', 19);
INSERT INTO ciudad VALUES (238, 'Río Caribe', 19);
INSERT INTO ciudad VALUES (239, 'El Pilar', 19);
INSERT INTO ciudad VALUES (240, 'Carúpano', 19);
INSERT INTO ciudad VALUES (241, 'Marigüitar', 19);
INSERT INTO ciudad VALUES (242, 'Yaguaraparo', 19);
INSERT INTO ciudad VALUES (243, 'Araya', 19);
INSERT INTO ciudad VALUES (244, 'Tunapuy', 19);
INSERT INTO ciudad VALUES (245, 'Irapa', 19);
INSERT INTO ciudad VALUES (246, 'San Antonio del Golfo', 19);
INSERT INTO ciudad VALUES (247, 'Cumanacoa', 19);
INSERT INTO ciudad VALUES (248, 'Cariaco', 19);
INSERT INTO ciudad VALUES (249, 'Cumaná', 19);
INSERT INTO ciudad VALUES (250, 'Güiria', 19);
INSERT INTO ciudad VALUES (251, 'Cordero', 20);
INSERT INTO ciudad VALUES (252, 'Las Mesas', 20);
INSERT INTO ciudad VALUES (253, 'Colón', 20);
INSERT INTO ciudad VALUES (254, 'San Antonio del Táchira', 20);
INSERT INTO ciudad VALUES (255, 'Táriba', 20);
INSERT INTO ciudad VALUES (256, 'Santa Ana de Táchira', 20);
INSERT INTO ciudad VALUES (257, 'San Rafael del Piñal', 20);
INSERT INTO ciudad VALUES (258, 'San José de Bolívar', 20);
INSERT INTO ciudad VALUES (259, 'La Fría', 20);
INSERT INTO ciudad VALUES (260, 'Palmira', 20);
INSERT INTO ciudad VALUES (261, 'Capacho Nuevo', 20);
INSERT INTO ciudad VALUES (262, 'La Grita', 20);
INSERT INTO ciudad VALUES (263, 'El Cobre', 20);
INSERT INTO ciudad VALUES (264, 'Rubio', 20);
INSERT INTO ciudad VALUES (265, 'Capacho Viejo', 20);
INSERT INTO ciudad VALUES (266, 'Abejales', 20);
INSERT INTO ciudad VALUES (267, 'Lobatera', 20);
INSERT INTO ciudad VALUES (268, 'Michelena', 20);
INSERT INTO ciudad VALUES (269, 'Coloncito', 20);
INSERT INTO ciudad VALUES (270, 'Ureña', 20);
INSERT INTO ciudad VALUES (271, 'Delicias', 20);
INSERT INTO ciudad VALUES (272, 'La Tendida', 20);
INSERT INTO ciudad VALUES (273, 'San Cristóbal', 20);
INSERT INTO ciudad VALUES (274, 'Seboruco', 20);
INSERT INTO ciudad VALUES (275, 'San Simón', 20);
INSERT INTO ciudad VALUES (276, 'Queniquea', 20);
INSERT INTO ciudad VALUES (277, 'San Josecito', 20);
INSERT INTO ciudad VALUES (278, 'Pregonero', 20);
INSERT INTO ciudad VALUES (279, 'Umuquena', 20);
INSERT INTO ciudad VALUES (280, 'Santa Isabel', 21);
INSERT INTO ciudad VALUES (281, 'Boconó', 21);
INSERT INTO ciudad VALUES (282, 'Sabana Grande', 21);
INSERT INTO ciudad VALUES (283, 'Chejendé', 21);
INSERT INTO ciudad VALUES (284, 'Carache', 21);
INSERT INTO ciudad VALUES (285, 'Escuque', 21);
INSERT INTO ciudad VALUES (286, 'El Paradero', 21);
INSERT INTO ciudad VALUES (287, 'Campo Elías', 21);
INSERT INTO ciudad VALUES (288, 'Santa Apolonia', 21);
INSERT INTO ciudad VALUES (289, 'El Dividive', 21);
INSERT INTO ciudad VALUES (290, 'Monte Carmelo', 21);
INSERT INTO ciudad VALUES (291, 'Motatán', 21);
INSERT INTO ciudad VALUES (292, 'Pampán', 21);
INSERT INTO ciudad VALUES (293, 'Pampanito', 21);
INSERT INTO ciudad VALUES (294, 'Betijoque', 21);
INSERT INTO ciudad VALUES (295, 'Carvajal', 21);
INSERT INTO ciudad VALUES (296, 'Sabana de Mendoza', 21);
INSERT INTO ciudad VALUES (297, 'Trujillo', 21);
INSERT INTO ciudad VALUES (298, 'La Quebrada', 21);
INSERT INTO ciudad VALUES (299, 'Valera', 21);
INSERT INTO ciudad VALUES (300, 'La Guaira', 22);
INSERT INTO ciudad VALUES (301, 'San Pablo', 23);
INSERT INTO ciudad VALUES (302, 'Aroa', 23);
INSERT INTO ciudad VALUES (303, 'Chivacoa', 23);
INSERT INTO ciudad VALUES (304, 'Cocorote', 23);
INSERT INTO ciudad VALUES (305, 'Independencia', 23);
INSERT INTO ciudad VALUES (306, 'Sabana de Parra', 23);
INSERT INTO ciudad VALUES (307, 'Boraure', 23);
INSERT INTO ciudad VALUES (308, 'Yumare', 23);
INSERT INTO ciudad VALUES (309, 'Nirgua', 23);
INSERT INTO ciudad VALUES (310, 'Yaritagua', 23);
INSERT INTO ciudad VALUES (311, 'San Felipe', 23);
INSERT INTO ciudad VALUES (312, 'Guama', 23);
INSERT INTO ciudad VALUES (313, 'Urachiche', 23);
INSERT INTO ciudad VALUES (314, 'Farriar', 23);
INSERT INTO ciudad VALUES (315, 'El Toro', 24);
INSERT INTO ciudad VALUES (316, 'San Timoteo', 24);
INSERT INTO ciudad VALUES (317, 'Cabimas', 24);
INSERT INTO ciudad VALUES (318, 'Encontrados', 24);
INSERT INTO ciudad VALUES (319, 'San Carlos del Zulia', 24);
INSERT INTO ciudad VALUES (320, 'Pueblo Nuevo-El Chivo', 24);
INSERT INTO ciudad VALUES (321, 'Sinamaica', 24);
INSERT INTO ciudad VALUES (322, 'La Concepción', 24);
INSERT INTO ciudad VALUES (323, 'Casigua El Cubo', 24);
INSERT INTO ciudad VALUES (324, 'Concepción', 24);
INSERT INTO ciudad VALUES (325, 'Ciudad Ojeda', 24);
INSERT INTO ciudad VALUES (326, 'Machiques', 24);
INSERT INTO ciudad VALUES (327, 'San Rafael del Moján', 24);
INSERT INTO ciudad VALUES (328, 'Maracaibo', 24);
INSERT INTO ciudad VALUES (329, 'Los Puertos de Altagracia', 24);
INSERT INTO ciudad VALUES (330, 'La Villa del Rosario', 24);
INSERT INTO ciudad VALUES (331, 'San Francisco', 24);
INSERT INTO ciudad VALUES (332, 'Santa Rita', 24);
INSERT INTO ciudad VALUES (333, 'Tía Juana', 24);
INSERT INTO ciudad VALUES (334, 'Bobures', 24);
INSERT INTO ciudad VALUES (335, 'Bachaquero', 24);


--
-- Name: ciudad_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('ciudad_id_seq', 1, false);


--
-- Data for Name: datos_personales; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO datos_personales VALUES (24625158, 'V', 'Mónica Eyeu', 'Bastardo Méndez', '1994-10-27', 'Femenino ', '0', 'Los Molinos, Calle La Paz', 'Carúpano');
INSERT INTO datos_personales VALUES (24281291, 'V', 'Cristhian Moisés', 'Salazar Castillo', '1996-04-28', 'Masculino', '0', '4ta Calle de Charallave, Sector La Poza', 'Carúpano');
INSERT INTO datos_personales VALUES (24281293, 'V', 'Moisés Cristhian', 'Salazar Castillo', '1996-04-28', 'Masculino', '0', '4ta Calle de Charallave, Sector La Poza', 'Carúpano');
INSERT INTO datos_personales VALUES (12365478, 'V', 'Profesor', 'Cuatro', '1978-12-29', 'Masculino', '0', NULL, NULL);
INSERT INTO datos_personales VALUES (78965412, 'V', 'Profesor', 'Tres', '1980-09-08', 'Femenino ', '0', NULL, NULL);
INSERT INTO datos_personales VALUES (14785236, 'V', 'Profesor', 'Uno', '1970-01-15', 'Masculino', '0', NULL, NULL);
INSERT INTO datos_personales VALUES (21011917, 'V', 'Miguel Ángel', 'Salazar Castillo', '1992-04-28', 'Masculino', '0', '$ta Calle, de Charallave, Sector La Poza', 'Carúpano');
INSERT INTO datos_personales VALUES (98745632, 'V', 'Morelis', 'Rojas', '1966-05-28', 'Femenino ', '0', NULL, NULL);
INSERT INTO datos_personales VALUES (36985214, 'V', 'Profesor', 'Dos', '1965-04-05', 'Femenino ', '0', NULL, NULL);
INSERT INTO datos_personales VALUES (14785258, 'V', 'Profesor', 'Cinco', '1985-09-16', 'Masculino', '0', NULL, NULL);
INSERT INTO datos_personales VALUES (12345789, 'V', 'Personal', 'Secretariado', '1975-08-01', 'Femenino ', '0', NULL, NULL);
INSERT INTO datos_personales VALUES (26646905, 'V', 'Jesus', 'Medina', '1995-05-17', 'Masculino', '0', 'Charallve', 'Margarita');
INSERT INTO datos_personales VALUES (12345678, 'V', 'a', 'b', '2015-07-01', 'Femenino ', '0', 's', 'ca');
INSERT INTO datos_personales VALUES (78965422, 'V', 'Profesora', 'De Matemáticas', '1985-07-11', 'Femenino ', '0', NULL, NULL);
INSERT INTO datos_personales VALUES (13123123, 'V', 'Profesor', 'De Inglés', '1990-10-23', 'Masculino', '0', NULL, NULL);
INSERT INTO datos_personales VALUES (25896355, 'V', 'Proebando', 'Apellido', '1995-08-28', 'Masculino', '0', 'Centro', 'Caracas');


--
-- Data for Name: docente; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO docente VALUES (21011917, 'Director');
INSERT INTO docente VALUES (98745632, 'Profesora');
INSERT INTO docente VALUES (14785236, 'Profesor de Matemáticas');
INSERT INTO docente VALUES (36985214, 'Profesora de Biolgías');
INSERT INTO docente VALUES (78965412, 'Profesor de Química');
INSERT INTO docente VALUES (12365478, 'Profesor de Educación Familiar');
INSERT INTO docente VALUES (14785258, 'Profesor de Geografía');
INSERT INTO docente VALUES (78965422, 'Profesora');
INSERT INTO docente VALUES (13123123, 'Profesor');


--
-- Data for Name: docente_asignatura; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO docente_asignatura VALUES (1, 14785258, 1);
INSERT INTO docente_asignatura VALUES (3, 36985214, 3);
INSERT INTO docente_asignatura VALUES (4, 36985214, 4);
INSERT INTO docente_asignatura VALUES (5, 98745632, 5);
INSERT INTO docente_asignatura VALUES (6, 36985214, 6);
INSERT INTO docente_asignatura VALUES (9, 12365478, 9);
INSERT INTO docente_asignatura VALUES (8, 14785236, 8);
INSERT INTO docente_asignatura VALUES (10, 36985214, 10);
INSERT INTO docente_asignatura VALUES (11, 12365478, 11);
INSERT INTO docente_asignatura VALUES (12, 78965422, 12);
INSERT INTO docente_asignatura VALUES (13, 13123123, 13);
INSERT INTO docente_asignatura VALUES (14, 98745632, 14);
INSERT INTO docente_asignatura VALUES (2, 36985214, 2);
INSERT INTO docente_asignatura VALUES (15, 21011917, 15);
INSERT INTO docente_asignatura VALUES (7, 78965412, 7);


--
-- Name: docente_asignatura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('docente_asignatura_id_seq', 15, true);


--
-- Data for Name: estado; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO estado VALUES (1, 'Distrito Capital');
INSERT INTO estado VALUES (2, 'Amazonas');
INSERT INTO estado VALUES (3, 'Anzo tegui');
INSERT INTO estado VALUES (4, 'Apure');
INSERT INTO estado VALUES (5, 'Aragua');
INSERT INTO estado VALUES (6, 'Barinas');
INSERT INTO estado VALUES (8, 'Carabobo');
INSERT INTO estado VALUES (9, 'Cojedes');
INSERT INTO estado VALUES (10, 'Delta Amacuro');
INSERT INTO estado VALUES (12, 'Gu rico');
INSERT INTO estado VALUES (13, 'Lara');
INSERT INTO estado VALUES (15, 'Miranda');
INSERT INTO estado VALUES (16, 'Monagas');
INSERT INTO estado VALUES (17, 'Nueva Esparta');
INSERT INTO estado VALUES (18, 'Portuguesa');
INSERT INTO estado VALUES (19, 'Sucre');
INSERT INTO estado VALUES (21, 'Trujillo');
INSERT INTO estado VALUES (22, 'Vargas');
INSERT INTO estado VALUES (23, 'Yaracuy');
INSERT INTO estado VALUES (24, 'Zulia');
INSERT INTO estado VALUES (7, 'Bolívar');
INSERT INTO estado VALUES (11, 'Falcón');
INSERT INTO estado VALUES (14, 'Mérida');
INSERT INTO estado VALUES (20, 'Táchira');


--
-- Name: estado_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('estado_id_seq', 1, false);


--
-- Data for Name: estudiante; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO estudiante VALUES (24625158, '0426-2836595', NULL);
INSERT INTO estudiante VALUES (24281291, '0294-3318514', NULL);
INSERT INTO estudiante VALUES (24281293, '0294-3318514', NULL);
INSERT INTO estudiante VALUES (26646905, '04169866810', 19);
INSERT INTO estudiante VALUES (12345678, '093456661161', 19);
INSERT INTO estudiante VALUES (25896355, '0426-5698778', 19);


--
-- Data for Name: historial; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO historial VALUES (93, '2015-07-11', '15:37:23.047', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (94, '2015-07-11', '15:39:24.745', 'Registró al Secretariado: <b>V-12345789</b>', 'Miguel');
INSERT INTO historial VALUES (95, '2015-07-11', '15:43:19.056', 'Registró al Usuario: <b>Secretaria</b>', 'Miguel');
INSERT INTO historial VALUES (96, '2015-07-11', '15:43:57.136', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (97, '2015-07-11', '15:44:00.214', 'Inició Sesión', 'Secretaria');
INSERT INTO historial VALUES (98, '2015-07-11', '15:47:56.791', 'Registró al Estudiante: <b>V-24625158</b>', 'Secretaria');
INSERT INTO historial VALUES (99, '2015-07-11', '15:50:27.77', 'Registró al Estudiante: <b>V-24281293</b>', 'Secretaria');
INSERT INTO historial VALUES (100, '2015-07-11', '15:53:34.441', 'Registró al Estudiante: <b>V-24281291</b>', 'Secretaria');
INSERT INTO historial VALUES (101, '2015-07-11', '15:56:38.414', 'Editó al Estudiante: <b>V-24281293</b>', 'Secretaria');
INSERT INTO historial VALUES (102, '2015-07-11', '16:00:06.994', 'Editó al Estudiante: <b>V-24281293</b>', 'Secretaria');
INSERT INTO historial VALUES (103, '2015-07-11', '16:07:21.01', 'Editó al Estudiante: <b>V-24281291</b>', 'Secretaria');
INSERT INTO historial VALUES (104, '2015-07-11', '16:07:46.68', 'Editó al Estudiante: <b>V-24281291</b>', 'Secretaria');
INSERT INTO historial VALUES (105, '2015-07-11', '16:08:01.891', 'Editó al Estudiante: <b>V-24281291</b>', 'Secretaria');
INSERT INTO historial VALUES (106, '2015-07-11', '16:11:46.211', 'Editó al Docente: <b>V-21011917</b>', 'Secretaria');
INSERT INTO historial VALUES (107, '2015-07-11', '16:14:33.342', 'Registró la Sección: <b>7-A</b>', 'Secretaria');
INSERT INTO historial VALUES (108, '2015-07-11', '16:15:00.116', 'Registró la Sección: <b>8-A</b>', 'Secretaria');
INSERT INTO historial VALUES (109, '2015-07-11', '16:15:04.922', 'Registró la Sección: <b>9-A</b>', 'Secretaria');
INSERT INTO historial VALUES (110, '2015-07-11', '16:15:10.17', 'Registró la Sección: <b>10-A</b>', 'Secretaria');
INSERT INTO historial VALUES (111, '2015-07-11', '16:15:14.002', 'Registró la Sección: <b>11-A</b>', 'Secretaria');
INSERT INTO historial VALUES (112, '2015-07-11', '16:15:20.277', 'Registró la Sección: <b>12-A</b>', 'Secretaria');
INSERT INTO historial VALUES (113, '2015-07-11', '16:15:26.365', 'Registró la Sección: <b>I-A</b>', 'Secretaria');
INSERT INTO historial VALUES (114, '2015-07-11', '16:15:32.335', 'Registró la Sección: <b>II-A</b>', 'Secretaria');
INSERT INTO historial VALUES (115, '2015-07-11', '16:15:38.166', 'Registró la Sección: <b>III-A</b>', 'Secretaria');
INSERT INTO historial VALUES (116, '2015-07-11', '16:15:43.532', 'Registró la Sección: <b>IV-A</b>', 'Secretaria');
INSERT INTO historial VALUES (117, '2015-07-11', '16:15:47.84', 'Registró la Sección: <b>V-A</b>', 'Secretaria');
INSERT INTO historial VALUES (118, '2015-07-11', '16:15:53.585', 'Registró la Sección: <b>VI-A</b>', 'Secretaria');
INSERT INTO historial VALUES (119, '2015-07-11', '16:18:46.314', 'Registró la Asignatura: <b>GEO7</b>', 'Secretaria');
INSERT INTO historial VALUES (120, '2015-07-11', '16:19:05.456', 'Registró la Asignatura: <b>BIOL7</b>', 'Secretaria');
INSERT INTO historial VALUES (121, '2015-07-11', '16:19:18.846', 'Registró la Asignatura: <b>ING7</b>', 'Secretaria');
INSERT INTO historial VALUES (122, '2015-07-11', '16:20:04.861', 'Registró la Asignatura: <b>Mat8</b>', 'Secretaria');
INSERT INTO historial VALUES (123, '2015-07-11', '16:20:17.578', 'Registró la Asignatura: <b>GEO8</b>', 'Secretaria');
INSERT INTO historial VALUES (124, '2015-07-11', '16:20:31.957', 'Registró la Asignatura: <b>BIO8</b>', 'Secretaria');
INSERT INTO historial VALUES (125, '2015-07-11', '16:20:50.392', 'Registró la Asignatura: <b>INg8</b>', 'Secretaria');
INSERT INTO historial VALUES (126, '2015-07-11', '16:21:06.148', 'Registró la Asignatura: <b>EDUCF8</b>', 'Secretaria');
INSERT INTO historial VALUES (127, '2015-07-11', '16:21:37.527', 'Registró la Asignatura: <b>mat9</b>', 'Secretaria');
INSERT INTO historial VALUES (128, '2015-07-11', '16:22:01.953', 'Registró la Asignatura: <b>HVen10</b>', 'Secretaria');
INSERT INTO historial VALUES (129, '2015-07-11', '16:22:18.628', 'Registró la Asignatura: <b>BIO10</b>', 'Secretaria');
INSERT INTO historial VALUES (130, '2015-07-11', '16:22:29.31', 'Registró la Asignatura: <b>INg10</b>', 'Secretaria');
INSERT INTO historial VALUES (131, '2015-07-11', '16:22:50.435', 'Registró la Asignatura: <b>EArt10</b>', 'Secretaria');
INSERT INTO historial VALUES (132, '2015-07-11', '16:23:10.132', 'Registró la Asignatura: <b>cast11</b>', 'Secretaria');
INSERT INTO historial VALUES (133, '2015-07-11', '16:23:20.455', 'Registró la Asignatura: <b>mat11</b>', 'Secretaria');
INSERT INTO historial VALUES (134, '2015-07-11', '16:23:39.318', 'Registró la Asignatura: <b>HUni11</b>', 'Secretaria');
INSERT INTO historial VALUES (135, '2015-07-11', '16:23:53.941', 'Registró la Asignatura: <b>BIO11</b>', 'Secretaria');
INSERT INTO historial VALUES (136, '2015-07-11', '16:24:17.097', 'Registró la Asignatura: <b>Ing11</b>', 'Secretaria');
INSERT INTO historial VALUES (137, '2015-07-11', '16:24:36.623', 'Registró la Asignatura: <b>EDUCF11</b>', 'Secretaria');
INSERT INTO historial VALUES (138, '2015-07-11', '16:24:46.966', 'Registró la Asignatura: <b>Quim11</b>', 'Secretaria');
INSERT INTO historial VALUES (139, '2015-07-11', '16:24:55.863', 'Registró la Asignatura: <b>FISC11</b>', 'Secretaria');
INSERT INTO historial VALUES (140, '2015-07-11', '16:25:16.271', 'Registró la Asignatura: <b>Mat12</b>', 'Secretaria');
INSERT INTO historial VALUES (141, '2015-07-11', '16:25:25.81', 'Registró la Asignatura: <b>HUni12</b>', 'Secretaria');
INSERT INTO historial VALUES (142, '2015-07-11', '16:25:35.31', 'Registró la Asignatura: <b>Bio12</b>', 'Secretaria');
INSERT INTO historial VALUES (143, '2015-07-11', '16:25:44.277', 'Registró la Asignatura: <b>ING12</b>', 'Secretaria');
INSERT INTO historial VALUES (144, '2015-07-11', '16:25:53.82', 'Registró la Asignatura: <b>EDUCF12</b>', 'Secretaria');
INSERT INTO historial VALUES (145, '2015-07-11', '16:26:05.201', 'Registró la Asignatura: <b>Quim12</b>', 'Secretaria');
INSERT INTO historial VALUES (146, '2015-07-11', '16:26:15.871', 'Registró la Asignatura: <b>FISC12</b>', 'Secretaria');
INSERT INTO historial VALUES (147, '2015-07-11', '16:44:53.006', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (148, '2015-07-11', '16:45:19.602', 'Registró el Período Académico: <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (149, '2015-07-11', '17:19:07.5', 'Registró Al Docente: <b>V-98745632</b>', 'Miguel');
INSERT INTO historial VALUES (150, '2015-07-11', '17:19:29.754', 'Editó al Docente: <b>V-98745632</b>', 'Miguel');
INSERT INTO historial VALUES (151, '2015-07-11', '17:50:46.939', 'Registró al Usuario: <b>Morelis</b>', 'Secretaria');
INSERT INTO historial VALUES (152, '2015-07-11', '17:50:54.357', 'Inició Sesión', 'Morelis');
INSERT INTO historial VALUES (153, '2015-07-11', '17:59:56.248', 'Cerró Sesión', 'Morelis');
INSERT INTO historial VALUES (154, '2015-07-11', '18:05:00.57', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (155, '2015-07-11', '21:58:51.455', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (156, '2015-07-11', '23:13:31.349', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (157, '2015-07-11', '23:23:52.353', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (158, '2015-07-11', '23:24:56.092', 'Registró Al Docente: <b>V-14785236</b>', 'Miguel');
INSERT INTO historial VALUES (159, '2015-07-11', '23:25:28.87', 'Registró Al Docente: <b>V-36985214</b>', 'Miguel');
INSERT INTO historial VALUES (160, '2015-07-11', '23:25:58.966', 'Registró Al Docente: <b>V-78965412</b>', 'Miguel');
INSERT INTO historial VALUES (161, '2015-07-11', '23:26:35.714', 'Registró Al Docente: <b>V-12365478</b>', 'Miguel');
INSERT INTO historial VALUES (162, '2015-07-11', '23:28:28.352', 'Registró Al Docente: <b>V-14785258</b>', 'Miguel');
INSERT INTO historial VALUES (163, '2015-07-12', '00:05:15.393', 'Registró Inscripción del Estudiante: <b>24281291</b> del Período Escolar: <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (164, '2015-07-12', '00:06:46.591', 'Editó al Estudiante: <b>V-24281291</b>', 'Miguel');
INSERT INTO historial VALUES (170, '2015-07-12', '00:23:53.052', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (171, '2015-07-12', '00:53:55.449', 'Cerró Sesión', 'Secretaria');
INSERT INTO historial VALUES (172, '2015-07-12', '00:53:57.998', 'Inició Sesión', 'Morelis');
INSERT INTO historial VALUES (173, '2015-07-12', '00:54:55.086', 'Registró al Usuario: <b>ProfesorDos</b>', 'Miguel');
INSERT INTO historial VALUES (174, '2015-07-12', '00:54:56.399', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (175, '2015-07-12', '00:55:05.237', 'Inició Sesión', 'ProfesorDos');
INSERT INTO historial VALUES (176, '2015-07-12', '00:57:53.18', 'Cerró Sesión', 'Morelis');
INSERT INTO historial VALUES (177, '2015-07-12', '00:57:54.405', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (178, '2015-07-12', '00:58:37.249', 'Registró al Usuario: <b>ProfesorCinco</b>', 'Miguel');
INSERT INTO historial VALUES (179, '2015-07-12', '00:58:38.364', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (180, '2015-07-12', '00:58:42.85', 'Inició Sesión', 'ProfesorCinco');
INSERT INTO historial VALUES (181, '2015-07-12', '00:59:14.586', 'Cerró Sesión', 'ProfesorCinco');
INSERT INTO historial VALUES (182, '2015-07-12', '00:59:15.614', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (183, '2015-07-12', '00:59:34.84', 'Cerró el Período Académico <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (184, '2015-07-12', '01:02:17.155', 'Cerró Sesión', 'ProfesorDos');
INSERT INTO historial VALUES (185, '2015-07-12', '01:02:28.342', 'Inició Sesión', 'Secretaria');
INSERT INTO historial VALUES (186, '2015-07-12', '18:22:52.854', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (187, '2015-07-12', '18:22:56.178', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (188, '2015-07-13', '08:57:28.514', 'Inició Sesión', 'Morelis');
INSERT INTO historial VALUES (189, '2015-07-13', '08:58:03.742', 'Cerró Sesión', 'Morelis');
INSERT INTO historial VALUES (190, '2015-07-13', '08:58:07.929', 'Inició Sesión', 'Secretaria');
INSERT INTO historial VALUES (191, '2015-07-13', '09:08:19.637', 'Cerró el Período Académico <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (192, '2015-07-13', '09:26:06.574', 'Cerró el Período Académico <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (193, '2015-07-13', '09:30:42.265', 'Editó la Asignatura: <b>Mat8</b>', 'Miguel');
INSERT INTO historial VALUES (194, '2015-07-13', '09:30:58.456', 'Editó la Asignatura: <b>INg8</b>', 'Miguel');
INSERT INTO historial VALUES (195, '2015-07-13', '09:31:19.053', 'Editó la Asignatura: <b>mat9</b>', 'Miguel');
INSERT INTO historial VALUES (196, '2015-07-13', '09:31:26.101', 'Editó la Asignatura: <b>INg10</b>', 'Miguel');
INSERT INTO historial VALUES (197, '2015-07-13', '09:31:32.8', 'Editó la Asignatura: <b>HVen10</b>', 'Miguel');
INSERT INTO historial VALUES (198, '2015-07-13', '09:31:48.687', 'Editó la Asignatura: <b>Quim11</b>', 'Miguel');
INSERT INTO historial VALUES (199, '2015-07-13', '09:31:55.595', 'Editó la Asignatura: <b>Ing11</b>', 'Miguel');
INSERT INTO historial VALUES (200, '2015-07-13', '09:32:01.247', 'Editó la Asignatura: <b>cast11</b>', 'Miguel');
INSERT INTO historial VALUES (201, '2015-07-13', '09:32:10.152', 'Editó la Asignatura: <b>mat11</b>', 'Miguel');
INSERT INTO historial VALUES (202, '2015-07-13', '09:32:21.967', 'Editó la Asignatura: <b>Bio12</b>', 'Miguel');
INSERT INTO historial VALUES (203, '2015-07-13', '09:32:28.024', 'Editó la Asignatura: <b>HUni12</b>', 'Miguel');
INSERT INTO historial VALUES (204, '2015-07-13', '09:32:35.39', 'Editó la Asignatura: <b>Quim12</b>', 'Miguel');
INSERT INTO historial VALUES (205, '2015-07-13', '09:32:48.478', 'Editó la Asignatura: <b>Mat12</b>', 'Miguel');
INSERT INTO historial VALUES (206, '2015-07-13', '12:58:48.979', 'Registró Inscripción del Estudiante: <b>24625158</b> del Período Escolar: <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (207, '2015-07-13', '14:18:16.942', 'Cerró el Período Académico <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (208, '2015-07-13', '22:13:39.889', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (209, '2015-07-13', '22:13:41.196', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (210, '2015-07-13', '22:44:35.932', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (211, '2015-07-13', '22:44:38.081', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (212, '2015-07-13', '22:53:54.875', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (213, '2015-07-13', '22:53:56.265', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (214, '2015-07-14', '09:38:46.543', 'Eliminó al Estudiante: <b>-</b>', 'Miguel');
INSERT INTO historial VALUES (215, '2015-07-14', '09:44:49.288', 'Eliminó al Estudiante: <b>-</b>', 'Miguel');
INSERT INTO historial VALUES (216, '2015-07-14', '09:56:46.818', 'Eliminó al Estudiante: <b>-</b>', 'Miguel');
INSERT INTO historial VALUES (217, '2015-07-14', '09:56:55.757', 'Eliminó al Estudiante: <b>-</b>', 'Miguel');
INSERT INTO historial VALUES (218, '2015-07-14', '10:22:19.741', 'Eliminó al Estudiante: <b>-</b>', 'Miguel');
INSERT INTO historial VALUES (219, '2015-07-14', '10:22:42.674', 'Editó al Estudiante: <b>V-24281293</b>', 'Miguel');
INSERT INTO historial VALUES (220, '2015-07-14', '10:23:01.497', 'Eliminó al Estudiante: <b>-</b>', 'Miguel');
INSERT INTO historial VALUES (221, '2015-07-14', '10:23:47.278', 'Eliminó al Estudiante: <b>-</b>', 'Miguel');
INSERT INTO historial VALUES (222, '2015-07-14', '10:23:51.186', 'Eliminó al Estudiante: <b>-</b>', 'Miguel');
INSERT INTO historial VALUES (223, '2015-07-14', '10:24:16.774', 'Eliminó al Estudiante: <b>-</b>', 'Miguel');
INSERT INTO historial VALUES (224, '2015-07-14', '10:39:53.084', 'Eliminó al Usuario: <b>Secretaria</b>', 'Miguel');
INSERT INTO historial VALUES (225, '2015-07-14', '10:39:54.934', 'Eliminó al Usuario: <b>Secretaria</b>', 'Miguel');
INSERT INTO historial VALUES (226, '2015-07-14', '10:40:45.04', 'Eliminó al Usuario: <b>Morelis</b>', 'Miguel');
INSERT INTO historial VALUES (227, '2015-07-14', '10:41:04.971', 'Eliminó al Usuario: <b>ProfesorCinco</b>', 'Miguel');
INSERT INTO historial VALUES (228, '2015-07-14', '10:48:15.508', 'Eliminó al Usuario: <b>ProfesorCinco</b>', 'Miguel');
INSERT INTO historial VALUES (229, '2015-07-14', '10:48:32.631', 'Eliminó al Usuario: <b>Secretaria</b>', 'Miguel');
INSERT INTO historial VALUES (230, '2015-07-14', '10:50:13.868', 'Restauró al Usuario: <b>Morelis</b>', 'Miguel');
INSERT INTO historial VALUES (231, '2015-07-14', '11:04:35.603', 'Restauró al Estudiante: <b>V-24281291</b>', 'Miguel');
INSERT INTO historial VALUES (232, '2015-07-14', '11:04:44.637', 'Restauró al Estudiante: <b>V-24281293</b>', 'Miguel');
INSERT INTO historial VALUES (233, '2015-07-14', '11:05:00.846', 'Eliminó al Usuario: <b>Secretaria</b>', 'Miguel');
INSERT INTO historial VALUES (234, '2015-07-14', '11:06:19.338', 'Eliminó al Usuario: <b>ProfesorDos</b>', 'Miguel');
INSERT INTO historial VALUES (235, '2015-07-14', '11:30:40.979', 'Eliminó al Docente: <b>V-</b>', 'Miguel');
INSERT INTO historial VALUES (236, '2015-07-14', '11:33:04.77', 'Eliminó al Docente: <b>V-</b>', 'Miguel');
INSERT INTO historial VALUES (237, '2015-07-14', '11:34:51.207', 'Restauró al Docente: <b>V-</b>', 'Miguel');
INSERT INTO historial VALUES (238, '2015-07-14', '11:35:09.082', 'Restauró al Docente: <b>V-</b>', 'Miguel');
INSERT INTO historial VALUES (239, '2015-07-14', '11:35:38.213', 'Eliminó al Docente: <b>V-14785236</b>', 'Miguel');
INSERT INTO historial VALUES (240, '2015-07-14', '11:35:57.054', 'Eliminó al Docente: <b>V-78965412</b>', 'Miguel');
INSERT INTO historial VALUES (241, '2015-07-14', '11:36:31.319', 'Restauró al Docente: <b>V-78965412</b>', 'Miguel');
INSERT INTO historial VALUES (242, '2015-07-14', '11:36:41.144', 'Restauró al Docente: <b>V-14785236</b>', 'Miguel');
INSERT INTO historial VALUES (243, '2015-07-14', '11:54:31.803', 'Eliminó al Secretariado: <b>V-12345789</b>', 'Miguel');
INSERT INTO historial VALUES (244, '2015-07-14', '12:09:00.241', 'Restauró al Secretariado: <b>V-12345789</b>', 'Miguel');
INSERT INTO historial VALUES (245, '2015-07-14', '12:09:09.817', 'Eliminó al Secretariado: <b>V-12345789</b>', 'Miguel');
INSERT INTO historial VALUES (246, '2015-07-14', '12:09:21', 'Restauró al Secretariado: <b>V-12345789</b>', 'Miguel');
INSERT INTO historial VALUES (247, '2015-07-14', '12:27:55.86', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (248, '2015-07-14', '12:27:56.891', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (249, '2015-07-16', '18:53:30.688', 'Registró al Estudiante: <b>V-26646905</b>', 'Miguel');
INSERT INTO historial VALUES (250, '2015-07-16', '19:05:14.306', 'Registró a la Institución Escolar: <b>Maria de Vera</b>', 'Miguel');
INSERT INTO historial VALUES (251, '2015-07-16', '19:08:18.729', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (252, '2015-07-16', '19:08:20.129', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (253, '2015-07-16', '19:09:37.836', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (254, '2015-07-16', '19:09:39.146', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (255, '2015-07-16', '19:10:37.28', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (256, '2015-07-16', '19:10:38.752', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (257, '2015-07-16', '19:11:03.973', 'Registró al Estudiante: <b>V-12345678</b>', 'Miguel');
INSERT INTO historial VALUES (258, '2015-07-16', '19:14:58.153', 'Registró Certificación de Notas del Estudiante: <b></b>', 'Miguel');
INSERT INTO historial VALUES (259, '2015-07-16', '19:17:55.646', 'Registró Inscripción del Estudiante: <b>26646905</b> del Período Escolar: <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (260, '2015-07-16', '19:37:06.823', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (261, '2015-07-16', '19:37:08.009', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (262, '2015-07-16', '19:41:15.883', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (263, '2015-07-16', '19:41:17.267', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (264, '2015-07-16', '19:45:28.345', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (265, '2015-07-16', '19:45:29.225', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (266, '2015-07-16', '19:46:42.619', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (267, '2015-07-16', '19:46:43.938', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (268, '2015-07-16', '19:48:18.646', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (269, '2015-07-16', '19:48:19.916', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (270, '2015-07-16', '19:49:52.941', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (271, '2015-07-16', '19:49:54.052', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (272, '2015-07-16', '19:55:30.162', 'Cerró el Período Académico <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (273, '2015-07-16', '20:11:23.58', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (274, '2015-07-16', '20:11:26.412', 'Inició Sesión', 'Morelis');
INSERT INTO historial VALUES (275, '2015-07-16', '20:12:51.674', 'Cerró Sesión', 'Morelis');
INSERT INTO historial VALUES (276, '2015-07-16', '20:13:10.444', 'Inició Sesión', 'Secretaria');
INSERT INTO historial VALUES (277, '2015-07-16', '20:14:57.101', 'Cerró Sesión', 'Secretaria');
INSERT INTO historial VALUES (278, '2015-07-16', '20:14:59.146', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (279, '2015-07-16', '23:23:27.718', 'Registró Certificación de Notas del Estudiante: <b></b>', 'Miguel');
INSERT INTO historial VALUES (280, '2015-07-16', '23:26:45.808', 'Registró Al Docente: <b>V-78965422</b>', 'Miguel');
INSERT INTO historial VALUES (281, '2015-07-16', '23:28:30.544', 'Registró Al Docente: <b>V-13123123</b>', 'Miguel');
INSERT INTO historial VALUES (282, '2015-07-16', '23:32:16.625', 'Registró Inscripción del Estudiante: <b>12345678</b> del Período Escolar: <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (283, '2015-07-17', '09:15:41.081', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (284, '2015-07-17', '09:15:44.303', 'Inició Sesión', 'Morelis');
INSERT INTO historial VALUES (285, '2015-07-17', '09:16:36.097', 'Cerró Sesión', 'Morelis');
INSERT INTO historial VALUES (286, '2015-07-17', '09:16:37.521', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (287, '2015-07-17', '11:02:02.583', 'Cerró el Período Académico <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (288, '2015-07-17', '11:12:22.88', 'Cerró el Período Académico <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (289, '2015-07-17', '12:05:52.878', 'Cerró el Período Académico <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (290, '2015-07-17', '12:16:11.726', 'Cerró el Período Académico <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (291, '2015-07-17', '12:17:02.263', 'Cerró el Período Académico <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (292, '2015-07-17', '12:22:15.667', 'Cerró el Período Académico <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (293, '2015-07-17', '12:22:38.847', 'Registró el Período Académico: <b>2015-II</b>', 'Miguel');
INSERT INTO historial VALUES (294, '2015-07-17', '13:04:36.983', 'Cerró el Período De Notas <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (295, '2015-07-17', '13:11:06.986', 'Cerró el Período De Notas <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (296, '2015-07-17', '13:13:59.546', 'Cerró el Período Académico <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (297, '2015-07-17', '13:18:58.914', 'Cerró el Período De Notas <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (298, '2015-07-17', '13:21:25.306', 'Cerró el Período De Notas <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (299, '2015-07-17', '13:29:29.176', 'Cerró el Período De Notas <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (300, '2015-07-17', '13:32:26.32', 'Cerró el Período De Notas <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (301, '2015-07-17', '13:41:52.357', 'Cerró el Período De Notas <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (302, '2015-07-17', '13:42:49.978', 'Cerró el Período De Notas <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (303, '2015-07-17', '21:29:34.151', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (304, '2015-07-17', '21:34:32.143', 'Registró Inscripción del Estudiante: <b>24281293</b> del Período Escolar: <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (305, '2015-07-17', '21:36:48.249', 'Cerró el Período De Notas <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (306, '2015-07-17', '21:54:13.096', 'Registró Inscripción del Estudiante: <b>24281293</b> del Período Escolar: <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (307, '2015-07-17', '21:56:14.944', 'Registró Inscripción del Estudiante: <b>24281293</b> del Período Escolar: <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (308, '2015-07-17', '22:03:47.219', 'Registró Inscripción del Estudiante: <b>24281293</b> del Período Escolar: <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (309, '2015-07-17', '22:04:02.063', 'Cerró el Período De Notas <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (310, '2015-07-17', '22:06:40.03', 'Registró Inscripción del Estudiante: <b>24281293</b> del Período Escolar: <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (311, '2015-07-17', '22:06:47.491', 'Cerró el Período De Notas <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (312, '2015-07-17', '22:13:14.223', 'Registró Inscripción del Estudiante: <b>24281293</b> del Período Escolar: <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (313, '2015-07-17', '22:15:03.219', 'Cerró el Período De Notas <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (314, '2015-07-17', '22:22:11.004', 'Registró Inscripción del Estudiante: <b>24281293</b> del Período Escolar: <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (315, '2015-07-17', '22:22:21.928', 'Cerró el Período De Notas <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (316, '2015-07-17', '22:28:40.284', 'Registró Inscripción del Estudiante: <b>24281293</b> del Período Escolar: <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (317, '2015-07-17', '22:29:07.631', 'Cerró el Período De Notas <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (318, '2015-07-17', '22:40:43.183', 'Emitió una constancia de estudio al estudiante : <b>24625158</b>', 'Miguel');
INSERT INTO historial VALUES (319, '2015-07-18', '19:05:16.502', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (320, '2015-07-18', '19:06:06.34', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (321, '2015-07-18', '19:23:21.506', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (322, '2015-07-18', '19:23:25.799', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (326, '2015-07-18', '20:39:28.642', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (327, '2015-07-18', '20:42:12.9', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (328, '2015-07-18', '20:42:26.667', 'Recuperó contraseña por pregunta y respuesta secreta', 'Miguel');
INSERT INTO historial VALUES (329, '2015-07-18', '20:42:33.347', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (330, '2015-07-18', '20:46:01.136', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (331, '2015-07-18', '20:51:34.068', 'Recuperó contraseña mediante pregunta y respuesta secreta', 'Miguel');
INSERT INTO historial VALUES (332, '2015-07-18', '21:18:42.659', 'Recuperó contraseña mediante su correo electrónico', 'Miguel');
INSERT INTO historial VALUES (333, '2015-07-18', '21:20:14.561', 'Recuperó contraseña mediante su correo electrónico', 'Miguel');
INSERT INTO historial VALUES (334, '2015-07-18', '21:25:58.713', 'Recuperó contraseña mediante su correo electrónico', 'Miguel');
INSERT INTO historial VALUES (335, '2015-07-18', '21:27:20.586', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (336, '2015-07-18', '21:37:55.582', 'Registró al Usuario: <b>ProfesorTres</b>', 'Miguel');
INSERT INTO historial VALUES (337, '2015-07-18', '21:39:08.56', 'Registró al Usuario: <b>ProfesorTres</b>', 'Miguel');
INSERT INTO historial VALUES (338, '2015-07-18', '21:43:32.259', 'Registró al Usuario: <b>ProfesorTres</b>', 'Miguel');
INSERT INTO historial VALUES (339, '2015-07-18', '21:47:05.192', 'Registró al Usuario: <b>ProfesorTres</b>', 'Miguel');
INSERT INTO historial VALUES (340, '2015-07-18', '21:49:22.377', 'Registró al Usuario: <b>ProfesorTres</b>', 'Miguel');
INSERT INTO historial VALUES (341, '2015-07-18', '21:50:33.254', 'Registró al Usuario: <b>ProfesorCuatro</b>', 'Miguel');
INSERT INTO historial VALUES (342, '2015-07-18', '21:52:02.889', 'Registró al Usuario: <b>ProfesorCuatro</b>', 'Miguel');
INSERT INTO historial VALUES (343, '2015-07-18', '21:53:20.771', 'Registró al Usuario: <b>ProfesorCuatro</b>', 'Miguel');
INSERT INTO historial VALUES (344, '2015-07-18', '21:54:26.897', 'Registró al Usuario: <b>ProfesorCuatro</b>', 'Miguel');
INSERT INTO historial VALUES (345, '2015-07-18', '22:42:26.675', 'Editó su cuenta de usuario', 'Miguel');
INSERT INTO historial VALUES (346, '2015-07-18', '22:45:44.257', 'Actualizó su cuenta de usuario', 'Miguel');
INSERT INTO historial VALUES (347, '2015-07-18', '22:52:00.906', 'Actualizó su cuenta de usuario', 'Miguel');
INSERT INTO historial VALUES (348, '2015-07-18', '22:52:06.514', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (349, '2015-07-18', '22:52:11.129', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (350, '2015-07-18', '22:59:59.604', 'Actualizó su cuenta de usuario', 'Miguel');
INSERT INTO historial VALUES (351, '2015-07-18', '23:00:26.174', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (352, '2015-07-18', '23:00:46.35', 'Recuperó contraseña mediante pregunta y respuesta secreta', 'Miguel');
INSERT INTO historial VALUES (353, '2015-07-18', '23:01:00.649', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (354, '2015-07-18', '23:02:48.183', 'Actualizó su cuenta de usuario', 'Miguel');
INSERT INTO historial VALUES (355, '2015-07-18', '23:02:57.93', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (356, '2015-07-18', '23:03:12.76', 'Recuperó contraseña mediante pregunta y respuesta secreta', 'Miguel');
INSERT INTO historial VALUES (357, '2015-07-18', '23:03:24.953', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (358, '2015-07-18', '23:04:11.212', 'Actualizó su cuenta de usuario', 'Miguel');
INSERT INTO historial VALUES (359, '2015-07-18', '23:04:47.638', 'Actualizó su cuenta de usuario', 'Miguel');
INSERT INTO historial VALUES (360, '2015-07-18', '23:07:14.762', 'Actualizó su cuenta de usuario', 'Miguel');
INSERT INTO historial VALUES (361, '2015-07-18', '23:08:06.744', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (362, '2015-07-18', '23:08:10.594', 'Inició Sesión', 'Morelis');
INSERT INTO historial VALUES (363, '2015-07-18', '23:09:48.205', 'Cerró Sesión', 'Morelis');
INSERT INTO historial VALUES (364, '2015-07-18', '23:09:52.419', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (365, '2015-07-18', '23:10:06.398', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (366, '2015-07-19', '08:48:34.482', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (367, '2015-07-19', '08:52:11.5', 'Cerró Sesión', 'Miguel');
INSERT INTO historial VALUES (368, '2015-07-19', '11:28:11.002', 'Inició Sesión', 'Miguel');
INSERT INTO historial VALUES (369, '2015-07-19', '11:47:41.74', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (370, '2015-07-19', '14:41:10.406', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (371, '2015-07-19', '14:41:43.486', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (372, '2015-07-19', '14:42:12.987', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (373, '2015-07-19', '14:42:43.042', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (374, '2015-07-19', '14:43:04.198', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (375, '2015-07-19', '14:43:08.157', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (376, '2015-07-19', '14:43:29.004', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (377, '2015-07-19', '14:43:58.476', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (378, '2015-07-19', '14:44:15.42', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (379, '2015-07-19', '14:44:28.852', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (380, '2015-07-19', '14:44:34.331', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (381, '2015-07-19', '14:44:45.194', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (382, '2015-07-19', '14:44:48.946', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (383, '2015-07-19', '14:46:43.141', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (384, '2015-07-19', '14:46:45.335', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (385, '2015-07-19', '14:52:31.798', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (386, '2015-07-19', '14:55:07.715', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (387, '2015-07-19', '14:57:35.891', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (388, '2015-07-19', '14:58:26.671', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (389, '2015-07-19', '14:58:51.009', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (390, '2015-07-19', '15:00:10.256', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (391, '2015-07-19', '15:00:25.72', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (392, '2015-07-19', '15:23:38.539', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (393, '2015-07-19', '15:24:14.201', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (394, '2015-07-19', '15:24:20.707', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (395, '2015-07-19', '15:27:06.44', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (396, '2015-07-19', '15:27:26.872', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (397, '2015-07-19', '15:27:46.747', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (398, '2015-07-19', '15:28:57.071', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (399, '2015-07-19', '15:29:56.367', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (400, '2015-07-19', '15:30:26.823', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (401, '2015-07-19', '15:33:31.664', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (402, '2015-07-19', '15:34:12.825', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (403, '2015-07-19', '15:34:35.375', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (404, '2015-07-19', '15:34:50.044', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (405, '2015-07-19', '15:34:59.019', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (406, '2015-07-19', '15:35:05.677', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (407, '2015-07-19', '15:35:13.796', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (408, '2015-07-19', '15:36:44.113', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (409, '2015-07-19', '15:37:21.21', 'Emitió una constancia de estudio al estudiante : <b>24281293</b>', 'Miguel');
INSERT INTO historial VALUES (410, '2015-07-19', '15:38:17.532', 'Emitió una constancia de estudio al estudiante : <b>24281293</b>', 'Miguel');
INSERT INTO historial VALUES (411, '2015-07-19', '17:34:50.608', 'Emitió una constancia de estudio al estudiante : <b>24281291</b>', 'Miguel');
INSERT INTO historial VALUES (412, '2015-07-19', '18:00:09.224', 'Emitió una constancia de estudio al estudiante : <b>V-24625158</b>', 'Miguel');
INSERT INTO historial VALUES (413, '2015-07-19', '18:57:02.163', 'Registró al Estudiante: <b>V-25896355</b>', 'Miguel');
INSERT INTO historial VALUES (414, '2015-07-19', '18:57:49.662', 'Editó al Estudiante: <b>V-25896355</b>', 'Miguel');
INSERT INTO historial VALUES (415, '2015-07-19', '18:58:51.548', 'Editó al Estudiante: <b>V-25896355</b>', 'Miguel');
INSERT INTO historial VALUES (416, '2015-07-19', '19:02:24.295', 'Registró Certificación de Notas del Estudiante: <b></b>', 'Miguel');
INSERT INTO historial VALUES (417, '2015-07-19', '19:23:24.149', 'Registró Inscripción del Estudiante: <b>25896355</b> del Período Escolar: <b>2015-I</b>', 'Miguel');
INSERT INTO historial VALUES (418, '2015-07-19', '19:36:25.382', 'Emitió una constancia de estudio al estudiante : <b>V-24281291</b>', 'Miguel');
INSERT INTO historial VALUES (419, '2015-07-19', '19:37:00.39', 'Emitió una constancia de estudio al estudiante : <b>V-24281291</b>', 'Miguel');
INSERT INTO historial VALUES (420, '2015-07-19', '19:38:09.635', 'Emitió una constancia de estudio al estudiante : <b>V-24281291</b>', 'Miguel');
INSERT INTO historial VALUES (421, '2015-07-19', '19:38:34.088', 'Emitió una constancia de estudio al estudiante : <b>V-24281291</b>', 'Miguel');
INSERT INTO historial VALUES (422, '2015-07-19', '19:39:10.511', 'Emitió una constancia de estudio al estudiante : <b>V-24281291</b>', 'Miguel');
INSERT INTO historial VALUES (423, '2015-07-19', '19:39:54.958', 'Emitió una constancia de estudio al estudiante : <b>V-24281291</b>', 'Miguel');
INSERT INTO historial VALUES (424, '2015-07-19', '19:40:10.829', 'Emitió una constancia de estudio al estudiante : <b>V-24281291</b>', 'Miguel');


--
-- Name: historial_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('historial_id_seq', 424, true);


--
-- Data for Name: horario_asignatura; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO horario_asignatura VALUES (1, 'GEO7', '7-A', 10, '2015-I');
INSERT INTO horario_asignatura VALUES (5, 'CASTLIT1', 'I-A', 10, '2015-I');
INSERT INTO horario_asignatura VALUES (6, 'INTINF1', 'I-A', 10, '2015-I');
INSERT INTO horario_asignatura VALUES (3, 'QUIM11', '11-A', 10, '2015-I');
INSERT INTO horario_asignatura VALUES (4, 'BIO12', '12-A', 10, '2015-I');
INSERT INTO horario_asignatura VALUES (9, 'MATEFIN', 'IV-A', 20, '2015-I');
INSERT INTO horario_asignatura VALUES (8, 'INGL4', 'IV-A', 20, '2015-I');
INSERT INTO horario_asignatura VALUES (10, 'MAT9', '9-A', 5, '2015-I');
INSERT INTO horario_asignatura VALUES (11, 'CAST9', '9-A', 5, '2015-I');
INSERT INTO horario_asignatura VALUES (12, 'MAT7', '7-A', 10, '2015-I');
INSERT INTO horario_asignatura VALUES (13, 'ING7', '7-A', 10, '2015-I');
INSERT INTO horario_asignatura VALUES (14, 'CAST7', '7-A', 10, '2015-I');
INSERT INTO horario_asignatura VALUES (2, 'BIOL7', '7-A', 10, '2015-I');
INSERT INTO horario_asignatura VALUES (15, 'ESTAD', 'IV-A', 10, '2015-I');
INSERT INTO horario_asignatura VALUES (7, 'ESTAD', 'IV-A', 10, '2015-I');


--
-- Name: horario_asignatura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('horario_asignatura_id_seq', 15, true);


--
-- Data for Name: horas_asignatura; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO horas_asignatura VALUES (1, '4', '18:00:00', '18:45:00', 1, 'A1');
INSERT INTO horas_asignatura VALUES (3, '5', '18:00:00', '19:30:00', 3, 'A2');
INSERT INTO horas_asignatura VALUES (4, '2', '19:30:00', '21:00:00', 4, 'A1');
INSERT INTO horas_asignatura VALUES (5, '1', '18:00:00', '19:00:00', 5, 'A3');
INSERT INTO horas_asignatura VALUES (6, '4', '18:00:00', '19:00:00', 5, 'A2');
INSERT INTO horas_asignatura VALUES (7, '2', '16:00:00', '17:30:00', 6, 'A3');
INSERT INTO horas_asignatura VALUES (10, '1', '13:00:00', '15:45:00', 9, '4');
INSERT INTO horas_asignatura VALUES (9, '1', '14:00:00', '15:45:00', 8, '4');
INSERT INTO horas_asignatura VALUES (11, '1', '18:00:00', '19:30:00', 10, 'A1');
INSERT INTO horas_asignatura VALUES (12, '1', '18:00:00', '19:30:00', 11, 'A1');
INSERT INTO horas_asignatura VALUES (13, '1', '18:00:00', '19:30:00', 12, 'A2');
INSERT INTO horas_asignatura VALUES (14, '5', '21:00:00', '18:33:00', 13, '123');
INSERT INTO horas_asignatura VALUES (15, '5', '18:00:00', '19:30:00', 14, 'A1');
INSERT INTO horas_asignatura VALUES (2, '1', '18:00:00', '18:45:00', 2, 'A1');
INSERT INTO horas_asignatura VALUES (16, '4', '19:20:00', '20:00:00', 15, 'A1');
INSERT INTO horas_asignatura VALUES (8, '1', '16:30:00', '19:30:00', 7, '4');


--
-- Name: horas_asignatura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('horas_asignatura_id_seq', 16, true);


--
-- Data for Name: inscripcion; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO inscripcion VALUES (1, 24281291, 21011917, '2015-07-12', '2015-I');
INSERT INTO inscripcion VALUES (2, 24625158, 21011917, '2015-07-13', '2015-I');
INSERT INTO inscripcion VALUES (3, 26646905, 21011917, '2015-07-16', '2015-I');
INSERT INTO inscripcion VALUES (4, 12345678, 21011917, '2015-07-16', '2015-I');
INSERT INTO inscripcion VALUES (12, 24281293, 21011917, '2015-07-17', '2015-I');
INSERT INTO inscripcion VALUES (13, 25896355, 21011917, '2015-07-19', '2015-I');


--
-- Data for Name: inscripcion_asignatura; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO inscripcion_asignatura VALUES (1, 1, 2);
INSERT INTO inscripcion_asignatura VALUES (2, 1, 1);
INSERT INTO inscripcion_asignatura VALUES (3, 2, 1);
INSERT INTO inscripcion_asignatura VALUES (4, 3, 7);
INSERT INTO inscripcion_asignatura VALUES (5, 4, 1);
INSERT INTO inscripcion_asignatura VALUES (6, 4, 13);
INSERT INTO inscripcion_asignatura VALUES (7, 4, 12);
INSERT INTO inscripcion_asignatura VALUES (43, 12, 2);
INSERT INTO inscripcion_asignatura VALUES (44, 12, 14);
INSERT INTO inscripcion_asignatura VALUES (45, 12, 1);
INSERT INTO inscripcion_asignatura VALUES (46, 12, 13);
INSERT INTO inscripcion_asignatura VALUES (47, 12, 12);
INSERT INTO inscripcion_asignatura VALUES (48, 13, 7);
INSERT INTO inscripcion_asignatura VALUES (49, 13, 11);
INSERT INTO inscripcion_asignatura VALUES (50, 13, 10);


--
-- Name: inscripcion_asignatura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inscripcion_asignatura_id_seq', 50, true);


--
-- Name: inscripcion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inscripcion_id_seq', 13, true);


--
-- Data for Name: institucion_escolar; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO institucion_escolar VALUES (3, 'U.E.A. Pedro Arismendi Brito', 240, '0');
INSERT INTO institucion_escolar VALUES (5, 'U.E.A.P Antonio José de Sucre', 240, '0');
INSERT INTO institucion_escolar VALUES (4, 'Liceo de Caracás', 1, '0');
INSERT INTO institucion_escolar VALUES (1, 'Centro de Educación de Edultos "República de Haití"', 240, '1');
INSERT INTO institucion_escolar VALUES (8, 'Maria de Vera', 240, '0');


--
-- Name: institucion_escolar_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('institucion_escolar_id_seq', 8, true);


--
-- Data for Name: municipio; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO municipio VALUES (1, 'Libertador', 1);
INSERT INTO municipio VALUES (2, 'Alto Orinoco', 2);
INSERT INTO municipio VALUES (3, 'Atabapo', 3);
INSERT INTO municipio VALUES (4, 'Atures', 4);
INSERT INTO municipio VALUES (5, 'Autana', 5);
INSERT INTO municipio VALUES (6, 'Manapiare', 6);
INSERT INTO municipio VALUES (7, 'Maroa', 7);
INSERT INTO municipio VALUES (8, 'Río Negro', 8);
INSERT INTO municipio VALUES (9, 'Anaco', 9);
INSERT INTO municipio VALUES (10, 'Aragua', 10);
INSERT INTO municipio VALUES (11, 'Bruzual', 11);
INSERT INTO municipio VALUES (12, 'Diego Bautista Urbaneja', 12);
INSERT INTO municipio VALUES (13, 'Peñalver', 13);
INSERT INTO municipio VALUES (14, 'Francisco del Carmen Carvajal', 14);
INSERT INTO municipio VALUES (15, 'General Sir Arthur McGregor', 15);
INSERT INTO municipio VALUES (16, 'Guanta', 16);
INSERT INTO municipio VALUES (17, 'Independencia', 17);
INSERT INTO municipio VALUES (18, 'José Gregorio Monagas', 18);
INSERT INTO municipio VALUES (19, 'Juan Antonio Sotillo', 19);
INSERT INTO municipio VALUES (20, 'Juan Manuel Cajigal', 20);
INSERT INTO municipio VALUES (21, 'Libertad', 21);
INSERT INTO municipio VALUES (22, 'Francisco de Miranda', 22);
INSERT INTO municipio VALUES (23, 'Pedro María Freites', 23);
INSERT INTO municipio VALUES (24, 'Píritu', 24);
INSERT INTO municipio VALUES (25, 'San José de Guanipa', 25);
INSERT INTO municipio VALUES (26, 'San Juan de Capistrano', 26);
INSERT INTO municipio VALUES (27, 'Santa Ana', 27);
INSERT INTO municipio VALUES (28, 'Simón Bolívar', 28);
INSERT INTO municipio VALUES (29, 'Simón Rodríguez', 29);
INSERT INTO municipio VALUES (30, 'Achaguas', 30);
INSERT INTO municipio VALUES (31, 'Biruaca', 31);
INSERT INTO municipio VALUES (32, 'Muñoz', 32);
INSERT INTO municipio VALUES (33, 'Páez', 33);
INSERT INTO municipio VALUES (34, 'Pedro Camejo', 34);
INSERT INTO municipio VALUES (35, 'Rómulo Gallegos', 35);
INSERT INTO municipio VALUES (36, 'San Fernando', 36);
INSERT INTO municipio VALUES (37, 'Atanasio Girardot', 37);
INSERT INTO municipio VALUES (38, 'Bolívar', 38);
INSERT INTO municipio VALUES (39, 'Camatagua', 39);
INSERT INTO municipio VALUES (40, 'Francisco Linares Alcántara', 40);
INSERT INTO municipio VALUES (41, 'José Ángel Lamas', 41);
INSERT INTO municipio VALUES (42, 'José Félix Ribas', 42);
INSERT INTO municipio VALUES (43, 'José Rafael Revenga', 43);
INSERT INTO municipio VALUES (44, 'Libertador', 44);
INSERT INTO municipio VALUES (45, 'Mario Briceño Iragorry', 45);
INSERT INTO municipio VALUES (46, 'Ocumare de la Costa de Oro', 46);
INSERT INTO municipio VALUES (47, 'San Casimiro', 47);
INSERT INTO municipio VALUES (48, 'San Sebastián', 48);
INSERT INTO municipio VALUES (49, 'Santiago Mariño', 49);
INSERT INTO municipio VALUES (50, 'Santos Michelena', 50);
INSERT INTO municipio VALUES (51, 'Sucre', 51);
INSERT INTO municipio VALUES (52, 'Tovar', 52);
INSERT INTO municipio VALUES (53, 'Urdaneta', 53);
INSERT INTO municipio VALUES (54, 'Zamora', 54);
INSERT INTO municipio VALUES (55, 'Alberto Arvelo Torrealba', 55);
INSERT INTO municipio VALUES (56, 'Andrés Eloy Blanco', 56);
INSERT INTO municipio VALUES (57, 'Antonio José de Sucre', 57);
INSERT INTO municipio VALUES (58, 'Arismendi', 58);
INSERT INTO municipio VALUES (59, 'Barinas', 59);
INSERT INTO municipio VALUES (60, 'Bolívar', 60);
INSERT INTO municipio VALUES (61, 'Cruz Paredes', 61);
INSERT INTO municipio VALUES (62, 'Ezequiel Zamora', 62);
INSERT INTO municipio VALUES (63, 'Obispos', 63);
INSERT INTO municipio VALUES (64, 'Pedraza', 64);
INSERT INTO municipio VALUES (65, 'Rojas', 65);
INSERT INTO municipio VALUES (66, 'Sosa', 66);
INSERT INTO municipio VALUES (67, 'Caroní', 67);
INSERT INTO municipio VALUES (68, 'Cedeño', 68);
INSERT INTO municipio VALUES (69, 'El Callao', 69);
INSERT INTO municipio VALUES (70, 'Gran Sabana', 70);
INSERT INTO municipio VALUES (71, 'Heres', 71);
INSERT INTO municipio VALUES (72, 'Piar', 72);
INSERT INTO municipio VALUES (73, 'Raúl Leoni', 73);
INSERT INTO municipio VALUES (74, 'Roscio', 74);
INSERT INTO municipio VALUES (75, 'Sifontes', 75);
INSERT INTO municipio VALUES (76, 'Sucre', 76);
INSERT INTO municipio VALUES (77, 'Padre Pedro Chien', 77);
INSERT INTO municipio VALUES (78, 'Bejuma', 78);
INSERT INTO municipio VALUES (79, 'Carlos Arvelo', 79);
INSERT INTO municipio VALUES (80, 'Diego Ibarra', 80);
INSERT INTO municipio VALUES (81, 'Guacara', 81);
INSERT INTO municipio VALUES (82, 'Juan José Mora', 82);
INSERT INTO municipio VALUES (83, 'Libertador', 83);
INSERT INTO municipio VALUES (84, 'Los Guayos', 84);
INSERT INTO municipio VALUES (85, 'Miranda', 85);
INSERT INTO municipio VALUES (86, 'Montalbán', 86);
INSERT INTO municipio VALUES (87, 'Naguanagua', 87);
INSERT INTO municipio VALUES (88, 'Puerto Cabello', 88);
INSERT INTO municipio VALUES (89, 'San Diego', 89);
INSERT INTO municipio VALUES (90, 'San Joaquín', 90);
INSERT INTO municipio VALUES (91, 'Valencia', 91);
INSERT INTO municipio VALUES (92, 'Anzoátegui', 92);
INSERT INTO municipio VALUES (93, 'Tinaquillo', 93);
INSERT INTO municipio VALUES (94, 'Girardot', 94);
INSERT INTO municipio VALUES (95, 'Lima Blanco', 95);
INSERT INTO municipio VALUES (96, 'Pao de San Juan Bautista', 96);
INSERT INTO municipio VALUES (97, 'Ricaurte', 97);
INSERT INTO municipio VALUES (98, 'Rómulo Gallegos', 98);
INSERT INTO municipio VALUES (99, 'San Carlos', 99);
INSERT INTO municipio VALUES (100, 'Tinaco', 100);
INSERT INTO municipio VALUES (101, 'Antonio Díaz', 101);
INSERT INTO municipio VALUES (102, 'Casacoima', 102);
INSERT INTO municipio VALUES (103, 'Pedernales', 103);
INSERT INTO municipio VALUES (104, 'Tucupita', 104);
INSERT INTO municipio VALUES (105, 'Acosta', 105);
INSERT INTO municipio VALUES (106, 'Bolívar', 106);
INSERT INTO municipio VALUES (107, 'Buchivacoa', 107);
INSERT INTO municipio VALUES (108, 'Cacique Manaure', 108);
INSERT INTO municipio VALUES (109, 'Carirubana', 109);
INSERT INTO municipio VALUES (110, 'Colina', 110);
INSERT INTO municipio VALUES (111, 'Dabajuro', 111);
INSERT INTO municipio VALUES (112, 'Democracia', 112);
INSERT INTO municipio VALUES (113, 'Falcón', 113);
INSERT INTO municipio VALUES (114, 'Federación', 114);
INSERT INTO municipio VALUES (115, 'Jacura', 115);
INSERT INTO municipio VALUES (116, 'José Laurencio Silva', 116);
INSERT INTO municipio VALUES (117, 'Los Taques', 117);
INSERT INTO municipio VALUES (118, 'Mauroa', 118);
INSERT INTO municipio VALUES (119, 'Miranda', 119);
INSERT INTO municipio VALUES (120, 'Monseñor Iturriza', 120);
INSERT INTO municipio VALUES (121, 'Palmasola', 121);
INSERT INTO municipio VALUES (122, 'Petit', 122);
INSERT INTO municipio VALUES (123, 'Píritu', 123);
INSERT INTO municipio VALUES (124, 'San Francisco', 124);
INSERT INTO municipio VALUES (125, 'Sucre', 125);
INSERT INTO municipio VALUES (126, 'Tocópero', 126);
INSERT INTO municipio VALUES (127, 'Unión', 127);
INSERT INTO municipio VALUES (128, 'Urumaco', 128);
INSERT INTO municipio VALUES (129, 'Zamora', 129);
INSERT INTO municipio VALUES (130, 'Camaguán', 130);
INSERT INTO municipio VALUES (131, 'Chaguaramas', 131);
INSERT INTO municipio VALUES (132, 'El Socorro', 132);
INSERT INTO municipio VALUES (133, 'José Félix Ribas', 133);
INSERT INTO municipio VALUES (134, 'José Tadeo Monagas', 134);
INSERT INTO municipio VALUES (135, 'Juan Germán Roscio', 135);
INSERT INTO municipio VALUES (136, 'Julián Mellado', 136);
INSERT INTO municipio VALUES (137, 'Las Mercedes', 137);
INSERT INTO municipio VALUES (138, 'Leonardo Infante', 138);
INSERT INTO municipio VALUES (139, 'Pedro Zaraza', 139);
INSERT INTO municipio VALUES (140, 'Ortiz', 140);
INSERT INTO municipio VALUES (141, 'San Gerónimo de Guayabal', 141);
INSERT INTO municipio VALUES (142, 'San José de Guaribe', 142);
INSERT INTO municipio VALUES (143, 'Santa María de Ipire', 143);
INSERT INTO municipio VALUES (144, 'Sebastián Francisco de Miranda', 144);
INSERT INTO municipio VALUES (145, 'Andrés Eloy Blanco', 145);
INSERT INTO municipio VALUES (146, 'Crespo', 146);
INSERT INTO municipio VALUES (147, 'Iribarren', 147);
INSERT INTO municipio VALUES (148, 'Jiménez', 148);
INSERT INTO municipio VALUES (149, 'Morán', 149);
INSERT INTO municipio VALUES (150, 'Palavecino', 150);
INSERT INTO municipio VALUES (151, 'Simón Planas', 151);
INSERT INTO municipio VALUES (152, 'Torres', 152);
INSERT INTO municipio VALUES (153, 'Urdaneta', 153);
INSERT INTO municipio VALUES (154, 'Alberto Adriani', 154);
INSERT INTO municipio VALUES (155, 'Andrés Bello', 155);
INSERT INTO municipio VALUES (156, 'Antonio Pinto Salinas', 156);
INSERT INTO municipio VALUES (157, 'Aricagua', 157);
INSERT INTO municipio VALUES (158, 'Arzobispo Chacón', 158);
INSERT INTO municipio VALUES (159, 'Campo Elías', 159);
INSERT INTO municipio VALUES (160, 'Caracciolo Parra Olmedo', 160);
INSERT INTO municipio VALUES (161, 'Cardenal Quintero', 161);
INSERT INTO municipio VALUES (162, 'Guaraque', 162);
INSERT INTO municipio VALUES (163, 'Julio César Salas', 163);
INSERT INTO municipio VALUES (164, 'Justo Briceño', 164);
INSERT INTO municipio VALUES (165, 'Libertador', 165);
INSERT INTO municipio VALUES (166, 'Miranda', 166);
INSERT INTO municipio VALUES (167, 'Obispo Ramos de Lora', 167);
INSERT INTO municipio VALUES (168, 'Padre Noguera', 168);
INSERT INTO municipio VALUES (169, 'Pueblo Llano', 169);
INSERT INTO municipio VALUES (170, 'Rangel', 170);
INSERT INTO municipio VALUES (171, 'Rivas Dávila', 171);
INSERT INTO municipio VALUES (172, 'Santos Marquina', 172);
INSERT INTO municipio VALUES (173, 'Sucre', 173);
INSERT INTO municipio VALUES (174, 'Tovar', 174);
INSERT INTO municipio VALUES (175, 'Tulio Febres Cordero', 175);
INSERT INTO municipio VALUES (176, 'Zea', 176);
INSERT INTO municipio VALUES (177, 'Acevedo', 177);
INSERT INTO municipio VALUES (178, 'Andrés Bello', 178);
INSERT INTO municipio VALUES (179, 'Baruta', 179);
INSERT INTO municipio VALUES (180, 'Brión', 180);
INSERT INTO municipio VALUES (181, 'Buroz', 181);
INSERT INTO municipio VALUES (182, 'Carrizal', 182);
INSERT INTO municipio VALUES (183, 'Chacao', 183);
INSERT INTO municipio VALUES (184, 'Cristóbal Rojas', 184);
INSERT INTO municipio VALUES (185, 'El Hatillo', 185);
INSERT INTO municipio VALUES (186, 'Guaicaipuro', 186);
INSERT INTO municipio VALUES (187, 'Independencia', 187);
INSERT INTO municipio VALUES (188, 'Lander', 188);
INSERT INTO municipio VALUES (189, 'Los Salias', 189);
INSERT INTO municipio VALUES (190, 'Páez', 190);
INSERT INTO municipio VALUES (191, 'Paz Castillo', 191);
INSERT INTO municipio VALUES (192, 'Pedro Gual', 192);
INSERT INTO municipio VALUES (193, 'Plaza', 193);
INSERT INTO municipio VALUES (194, 'Simón Bolívar', 194);
INSERT INTO municipio VALUES (195, 'Sucre', 195);
INSERT INTO municipio VALUES (196, 'Urdaneta', 196);
INSERT INTO municipio VALUES (197, 'Zamora', 197);
INSERT INTO municipio VALUES (198, 'Acosta', 198);
INSERT INTO municipio VALUES (199, 'Aguasay', 199);
INSERT INTO municipio VALUES (200, 'Bolívar', 200);
INSERT INTO municipio VALUES (201, 'Caripe', 201);
INSERT INTO municipio VALUES (202, 'Cedeño', 202);
INSERT INTO municipio VALUES (203, 'Ezequiel Zamora', 203);
INSERT INTO municipio VALUES (204, 'Libertador', 204);
INSERT INTO municipio VALUES (205, 'Maturín', 205);
INSERT INTO municipio VALUES (206, 'Piar', 206);
INSERT INTO municipio VALUES (207, 'Punceres', 207);
INSERT INTO municipio VALUES (208, 'Santa Bárbara', 208);
INSERT INTO municipio VALUES (209, 'Sotillo', 209);
INSERT INTO municipio VALUES (210, 'Uracoa', 210);
INSERT INTO municipio VALUES (211, 'Antolín del Campo', 211);
INSERT INTO municipio VALUES (212, 'Arismendi', 212);
INSERT INTO municipio VALUES (213, 'Díaz', 213);
INSERT INTO municipio VALUES (214, 'García', 214);
INSERT INTO municipio VALUES (215, 'Gómez', 215);
INSERT INTO municipio VALUES (216, 'Maneiro', 216);
INSERT INTO municipio VALUES (217, 'Marcano', 217);
INSERT INTO municipio VALUES (218, 'Mariño', 218);
INSERT INTO municipio VALUES (219, 'Península de Macanao', 219);
INSERT INTO municipio VALUES (220, 'Tubores', 220);
INSERT INTO municipio VALUES (221, 'Villalba', 221);
INSERT INTO municipio VALUES (222, 'Agua Blanca', 222);
INSERT INTO municipio VALUES (223, 'Araure', 223);
INSERT INTO municipio VALUES (224, 'Esteller', 224);
INSERT INTO municipio VALUES (225, 'Guanare', 225);
INSERT INTO municipio VALUES (226, 'Guanarito', 226);
INSERT INTO municipio VALUES (227, 'Monseñor José Vicente de Unda', 227);
INSERT INTO municipio VALUES (228, 'Ospino', 228);
INSERT INTO municipio VALUES (229, 'Páez', 229);
INSERT INTO municipio VALUES (230, 'Papelón', 230);
INSERT INTO municipio VALUES (231, 'San Genaro de Boconoíto', 231);
INSERT INTO municipio VALUES (232, 'San Rafael de Onoto', 232);
INSERT INTO municipio VALUES (233, 'Santa Rosalía', 233);
INSERT INTO municipio VALUES (234, 'Sucre', 234);
INSERT INTO municipio VALUES (235, 'Turén', 235);
INSERT INTO municipio VALUES (236, 'Andrés Eloy Blanco', 236);
INSERT INTO municipio VALUES (237, 'Andrés Mata', 237);
INSERT INTO municipio VALUES (238, 'Arismendi', 238);
INSERT INTO municipio VALUES (239, 'Benítez', 239);
INSERT INTO municipio VALUES (240, 'Bermúdez', 240);
INSERT INTO municipio VALUES (241, 'Bolívar', 241);
INSERT INTO municipio VALUES (242, 'Cajigal', 242);
INSERT INTO municipio VALUES (243, 'Cruz Salmerón Acosta', 243);
INSERT INTO municipio VALUES (244, 'Libertador', 244);
INSERT INTO municipio VALUES (245, 'Mariño', 245);
INSERT INTO municipio VALUES (246, 'Mejía', 246);
INSERT INTO municipio VALUES (247, 'Montes', 247);
INSERT INTO municipio VALUES (248, 'Ribero', 248);
INSERT INTO municipio VALUES (249, 'Sucre', 249);
INSERT INTO municipio VALUES (250, 'Valdez', 250);
INSERT INTO municipio VALUES (251, 'Andrés Bello', 251);
INSERT INTO municipio VALUES (252, 'Antonio Rómulo Costa', 252);
INSERT INTO municipio VALUES (253, 'Ayacucho', 253);
INSERT INTO municipio VALUES (254, 'Bolívar', 254);
INSERT INTO municipio VALUES (255, 'Cárdenas', 255);
INSERT INTO municipio VALUES (256, 'Córdoba', 256);
INSERT INTO municipio VALUES (257, 'Fernández Feo', 257);
INSERT INTO municipio VALUES (258, 'Francisco de Miranda', 258);
INSERT INTO municipio VALUES (259, 'García de Hevia', 259);
INSERT INTO municipio VALUES (260, 'Guásimos', 260);
INSERT INTO municipio VALUES (261, 'Independencia', 261);
INSERT INTO municipio VALUES (262, 'Jáuregui', 262);
INSERT INTO municipio VALUES (263, 'José María Vargas', 263);
INSERT INTO municipio VALUES (264, 'Junín', 264);
INSERT INTO municipio VALUES (265, 'Libertad', 265);
INSERT INTO municipio VALUES (266, 'Libertador', 266);
INSERT INTO municipio VALUES (267, 'Lobatera', 267);
INSERT INTO municipio VALUES (268, 'Michelena', 268);
INSERT INTO municipio VALUES (269, 'Panamericano', 269);
INSERT INTO municipio VALUES (270, 'Pedro María Ureña', 270);
INSERT INTO municipio VALUES (271, 'Rafael Urdaneta', 271);
INSERT INTO municipio VALUES (272, 'Samuel Darío Maldonado', 272);
INSERT INTO municipio VALUES (273, 'San Cristóbal', 273);
INSERT INTO municipio VALUES (274, 'Seboruco', 274);
INSERT INTO municipio VALUES (275, 'Simón Rodríguez', 275);
INSERT INTO municipio VALUES (276, 'Sucre', 276);
INSERT INTO municipio VALUES (277, 'Torbes', 277);
INSERT INTO municipio VALUES (278, 'Uribante', 278);
INSERT INTO municipio VALUES (279, 'San Judas Tadeo', 279);
INSERT INTO municipio VALUES (280, 'Andrés Bello', 280);
INSERT INTO municipio VALUES (281, 'Boconó', 281);
INSERT INTO municipio VALUES (282, 'Bolívar', 282);
INSERT INTO municipio VALUES (283, 'Candelaria', 283);
INSERT INTO municipio VALUES (284, 'Carache', 284);
INSERT INTO municipio VALUES (285, 'Escuque', 285);
INSERT INTO municipio VALUES (286, 'José Felipe Márquez Cañizalez', 286);
INSERT INTO municipio VALUES (287, 'Juan Vicente Campos Elías', 287);
INSERT INTO municipio VALUES (288, 'La Ceiba', 288);
INSERT INTO municipio VALUES (289, 'Miranda', 289);
INSERT INTO municipio VALUES (290, 'Monte Carmelo', 290);
INSERT INTO municipio VALUES (291, 'Motatán', 291);
INSERT INTO municipio VALUES (292, 'Pampán', 292);
INSERT INTO municipio VALUES (293, 'Pampanito', 293);
INSERT INTO municipio VALUES (294, 'Rafael Rangel', 294);
INSERT INTO municipio VALUES (295, 'San Rafael de Carvajal', 295);
INSERT INTO municipio VALUES (296, 'Sucre', 296);
INSERT INTO municipio VALUES (297, 'Trujillo', 297);
INSERT INTO municipio VALUES (298, 'Urdaneta', 298);
INSERT INTO municipio VALUES (299, 'Valera', 299);
INSERT INTO municipio VALUES (300, 'Vargas', 300);
INSERT INTO municipio VALUES (301, 'Arístides Bastidas', 301);
INSERT INTO municipio VALUES (302, 'Bolívar', 302);
INSERT INTO municipio VALUES (303, 'Bruzual', 303);
INSERT INTO municipio VALUES (304, 'Cocorote', 304);
INSERT INTO municipio VALUES (305, 'Independencia', 305);
INSERT INTO municipio VALUES (306, 'José Antonio Páez', 306);
INSERT INTO municipio VALUES (307, 'La Trinidad', 307);
INSERT INTO municipio VALUES (308, 'Manuel Monge', 308);
INSERT INTO municipio VALUES (309, 'Nirgua', 309);
INSERT INTO municipio VALUES (310, 'Peña', 310);
INSERT INTO municipio VALUES (311, 'San Felipe', 311);
INSERT INTO municipio VALUES (312, 'Sucre', 312);
INSERT INTO municipio VALUES (313, 'Urachiche', 313);
INSERT INTO municipio VALUES (314, 'Veroes', 314);
INSERT INTO municipio VALUES (315, 'Almirante Padilla', 315);
INSERT INTO municipio VALUES (316, 'Baralt', 316);
INSERT INTO municipio VALUES (317, 'Cabimas', 317);
INSERT INTO municipio VALUES (318, 'Catatumbo', 318);
INSERT INTO municipio VALUES (319, 'Colón', 319);
INSERT INTO municipio VALUES (320, 'Francisco Javier Pulgar', 320);
INSERT INTO municipio VALUES (321, 'Guajira', 321);
INSERT INTO municipio VALUES (322, 'Jesús Enrique Losada', 322);
INSERT INTO municipio VALUES (323, 'Jesús María Semprún', 323);
INSERT INTO municipio VALUES (324, 'La Cañada de Urdaneta', 324);
INSERT INTO municipio VALUES (325, 'Lagunillas', 235);
INSERT INTO municipio VALUES (326, 'Machiques de Perijá', 326);
INSERT INTO municipio VALUES (327, 'Mara', 327);
INSERT INTO municipio VALUES (328, 'Maracaibo', 328);
INSERT INTO municipio VALUES (329, 'Miranda', 329);
INSERT INTO municipio VALUES (330, 'Rosario de Perijá', 330);
INSERT INTO municipio VALUES (331, 'San Francisco', 331);
INSERT INTO municipio VALUES (332, 'Santa Rita', 332);
INSERT INTO municipio VALUES (333, 'Simón Bolívar', 333);
INSERT INTO municipio VALUES (334, 'Sucre', 334);
INSERT INTO municipio VALUES (335, 'Valmore Rodríguez', 335);


--
-- Name: municipio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('municipio_id_seq', 1, false);


--
-- Data for Name: nota; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO nota VALUES (27, 0.00, 87);
INSERT INTO nota VALUES (28, 0.00, 87);
INSERT INTO nota VALUES (29, 0.00, 87);
INSERT INTO nota VALUES (30, 0.00, 87);
INSERT INTO nota VALUES (31, 0.00, 87);
INSERT INTO nota VALUES (32, 0.00, 88);
INSERT INTO nota VALUES (33, 0.00, 88);
INSERT INTO nota VALUES (34, 0.00, 88);
INSERT INTO nota VALUES (35, 0.00, 88);
INSERT INTO nota VALUES (36, 0.00, 88);
INSERT INTO nota VALUES (12, 13.00, 82);
INSERT INTO nota VALUES (13, 15.00, 82);
INSERT INTO nota VALUES (14, 16.50, 82);
INSERT INTO nota VALUES (15, 1.00, 82);
INSERT INTO nota VALUES (16, 1.00, 82);
INSERT INTO nota VALUES (17, 10.00, 85);
INSERT INTO nota VALUES (18, 10.00, 85);
INSERT INTO nota VALUES (19, 10.00, 85);
INSERT INTO nota VALUES (20, 10.00, 85);
INSERT INTO nota VALUES (21, 5.00, 85);
INSERT INTO nota VALUES (212, 0.00, 124);
INSERT INTO nota VALUES (213, 0.00, 124);
INSERT INTO nota VALUES (214, 0.00, 124);
INSERT INTO nota VALUES (215, 0.00, 124);
INSERT INTO nota VALUES (216, 0.00, 124);
INSERT INTO nota VALUES (217, 0.00, 125);
INSERT INTO nota VALUES (218, 0.00, 125);
INSERT INTO nota VALUES (219, 0.00, 125);
INSERT INTO nota VALUES (220, 0.00, 125);
INSERT INTO nota VALUES (221, 0.00, 125);
INSERT INTO nota VALUES (222, 0.00, 126);
INSERT INTO nota VALUES (223, 0.00, 126);
INSERT INTO nota VALUES (224, 0.00, 126);
INSERT INTO nota VALUES (225, 0.00, 126);
INSERT INTO nota VALUES (226, 0.00, 126);
INSERT INTO nota VALUES (22, 0.00, 86);
INSERT INTO nota VALUES (23, 0.00, 86);
INSERT INTO nota VALUES (24, 0.00, 86);
INSERT INTO nota VALUES (25, 0.00, 86);
INSERT INTO nota VALUES (26, 0.00, 86);
INSERT INTO nota VALUES (6, 11.00, 83);
INSERT INTO nota VALUES (7, 14.00, 83);
INSERT INTO nota VALUES (8, 10.00, 83);
INSERT INTO nota VALUES (9, 11.00, 83);
INSERT INTO nota VALUES (10, 1.00, 83);
INSERT INTO nota VALUES (1, 14.00, 84);
INSERT INTO nota VALUES (2, 12.00, 84);
INSERT INTO nota VALUES (3, 20.00, 84);
INSERT INTO nota VALUES (4, 13.00, 84);
INSERT INTO nota VALUES (5, 0.00, 84);
INSERT INTO nota VALUES (227, 0.00, 127);
INSERT INTO nota VALUES (228, 0.00, 127);
INSERT INTO nota VALUES (229, 0.00, 127);
INSERT INTO nota VALUES (230, 0.00, 127);
INSERT INTO nota VALUES (231, 0.00, 127);
INSERT INTO nota VALUES (232, 0.00, 128);
INSERT INTO nota VALUES (233, 0.00, 128);
INSERT INTO nota VALUES (234, 0.00, 128);
INSERT INTO nota VALUES (235, 0.00, 128);
INSERT INTO nota VALUES (236, 0.00, 128);
INSERT INTO nota VALUES (237, 0.00, 129);
INSERT INTO nota VALUES (238, 0.00, 129);
INSERT INTO nota VALUES (239, 0.00, 129);
INSERT INTO nota VALUES (240, 0.00, 129);
INSERT INTO nota VALUES (241, 0.00, 129);
INSERT INTO nota VALUES (242, 0.00, 130);
INSERT INTO nota VALUES (243, 0.00, 130);
INSERT INTO nota VALUES (244, 0.00, 130);
INSERT INTO nota VALUES (245, 0.00, 130);
INSERT INTO nota VALUES (246, 0.00, 130);
INSERT INTO nota VALUES (247, 0.00, 131);
INSERT INTO nota VALUES (248, 0.00, 131);
INSERT INTO nota VALUES (249, 0.00, 131);
INSERT INTO nota VALUES (250, 0.00, 131);
INSERT INTO nota VALUES (251, 0.00, 131);


--
-- Name: nota_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('nota_id_seq', 251, true);


--
-- Data for Name: periodo_academico; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO periodo_academico VALUES (1, '2015-I', '1', '2015-07-11', '2015-01-13', '2015-07-18', NULL, '1');


--
-- Name: periodo_academico_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('periodo_academico_id_seq', 2, true);


--
-- Data for Name: record_academico; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO record_academico VALUES (19, 12345678, 14.00, 'CAST7', NULL, 'Cert', '2015-07-03', 8);
INSERT INTO record_academico VALUES (20, 12345678, 12.00, 'BIOL7', NULL, 'Cert', '2015-07-01', 8);
INSERT INTO record_academico VALUES (21, 12345678, 12.00, 'BIO8', NULL, 'Cert', '2015-07-01', 8);
INSERT INTO record_academico VALUES (22, 12345678, 12.00, 'EDUCF8', NULL, 'Cert', '2015-07-01', 8);
INSERT INTO record_academico VALUES (23, 12345678, 13.00, 'CAST9', NULL, 'Cert', '2015-07-08', 8);
INSERT INTO record_academico VALUES (24, 12345678, 15.00, 'MAT9', NULL, 'Cert', '2015-07-09', 8);
INSERT INTO record_academico VALUES (25, 12345678, 10.00, 'ING8', NULL, 'Cert', '2015-07-13', 8);
INSERT INTO record_academico VALUES (26, 12345678, 18.00, 'MAT8', NULL, 'Cert', '2015-01-01', 8);
INSERT INTO record_academico VALUES (27, 12345678, 16.00, 'GEO8', NULL, 'Cert', '2015-07-01', 8);
INSERT INTO record_academico VALUES (239, 12345678, 1.00, 'ING7', '2015-I', 'F', '2015-07-17', 1);
INSERT INTO record_academico VALUES (240, 12345678, 1.00, 'GEO7', '2015-I', 'F', '2015-07-17', 1);
INSERT INTO record_academico VALUES (241, 12345678, 1.00, 'MAT7', '2015-I', 'F', '2015-07-17', 1);
INSERT INTO record_academico VALUES (242, 24281291, 9.00, 'BIOL7', '2015-I', 'F', '2015-07-17', 1);
INSERT INTO record_academico VALUES (246, 24281293, 1.00, 'MAT7', '2015-I', 'F', '2015-07-17', 1);
INSERT INTO record_academico VALUES (248, 24281293, 1.00, 'GEO7', '2015-I', 'F', '2015-07-17', 1);
INSERT INTO record_academico VALUES (249, 24625158, 15.00, 'GEO7', '2015-I', 'F', '2015-07-17', 1);
INSERT INTO record_academico VALUES (250, 26646905, 9.00, 'ESTAD', '2015-I', 'F', '2015-07-17', 1);
INSERT INTO record_academico VALUES (247, 24281293, 12.00, 'BIOL7', '2015-I', 'R', '2015-07-17', 1);
INSERT INTO record_academico VALUES (244, 24281293, 13.00, 'CAST7', '2015-I', 'R', '2015-07-17', 1);
INSERT INTO record_academico VALUES (245, 24281293, 10.00, 'ING7', '2015-I', 'R', '2015-07-17', 1);
INSERT INTO record_academico VALUES (243, 24281291, 11.00, 'GEO7', '2015-I', 'R', '2015-07-17', 1);
INSERT INTO record_academico VALUES (251, 24281291, 12.00, 'BIO8', '2015-I', 'E', '2015-07-17', 1);
INSERT INTO record_academico VALUES (252, 24281291, 14.00, 'EDUCF8', '2015-I', 'E', '2015-07-17', 1);
INSERT INTO record_academico VALUES (253, 25896355, 14.00, 'CAST7', NULL, 'C', '2015-01-02', 4);
INSERT INTO record_academico VALUES (254, 25896355, 10.00, 'MAT7', NULL, 'C', '2015-07-01', 4);
INSERT INTO record_academico VALUES (255, 25896355, 14.00, 'GEO7', NULL, 'C', '2015-01-01', 4);
INSERT INTO record_academico VALUES (256, 25896355, 12.00, 'BIOL7', NULL, 'C', '2015-02-05', 4);
INSERT INTO record_academico VALUES (257, 25896355, 13.00, 'ING7', NULL, 'C', '2015-02-06', 4);
INSERT INTO record_academico VALUES (258, 25896355, 14.00, 'GEO8', NULL, 'C', '2015-01-01', 4);
INSERT INTO record_academico VALUES (259, 25896355, 16.00, 'BIO8', NULL, 'C', '2015-01-01', 4);
INSERT INTO record_academico VALUES (260, 25896355, 13.00, 'EDUCF8', NULL, 'C', '2015-01-01', 4);
INSERT INTO record_academico VALUES (261, 25896355, 11.00, 'MAT8', NULL, 'C', '2015-01-01', 4);
INSERT INTO record_academico VALUES (262, 25896355, 18.00, 'ING8', NULL, 'C', '2015-01-01', 4);


--
-- Name: record_academico_id_institucion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('record_academico_id_institucion_seq', 1, false);


--
-- Name: record_academico_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('record_academico_id_seq', 262, true);


--
-- Data for Name: seccion; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO seccion VALUES ('7-A', 7, '1');
INSERT INTO seccion VALUES ('8-A', 8, '1');
INSERT INTO seccion VALUES ('9-A', 9, '1');
INSERT INTO seccion VALUES ('10-A', 10, '1');
INSERT INTO seccion VALUES ('11-A', 11, '1');
INSERT INTO seccion VALUES ('12-A', 12, '1');
INSERT INTO seccion VALUES ('I-A', 1, '1');
INSERT INTO seccion VALUES ('II-A', 2, '1');
INSERT INTO seccion VALUES ('III-A', 3, '1');
INSERT INTO seccion VALUES ('IV-A', 4, '1');
INSERT INTO seccion VALUES ('V-A', 5, '1');
INSERT INTO seccion VALUES ('VI-A', 6, '1');


--
-- Data for Name: secretariado; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO secretariado VALUES (12345789, 'Secretariado', '0416-1236547');


--
-- Data for Name: semestre; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO semestre VALUES (7, '7mo Semestre', 1);
INSERT INTO semestre VALUES (8, '8vo Semestre', 2);
INSERT INTO semestre VALUES (9, '9vo Semestre', 3);
INSERT INTO semestre VALUES (10, '10mo Semestre', 4);
INSERT INTO semestre VALUES (11, '11vo Semestre', 5);
INSERT INTO semestre VALUES (2, 'II Semestre', 8);
INSERT INTO semestre VALUES (3, 'III Semestre', 9);
INSERT INTO semestre VALUES (4, 'IV Semestre', 10);
INSERT INTO semestre VALUES (5, 'V Semestre', 11);
INSERT INTO semestre VALUES (6, 'VI Semestre', 12);
INSERT INTO semestre VALUES (12, '12vo Semestre', 6);
INSERT INTO semestre VALUES (1, 'I Semestre', 7);


--
-- Name: semestre_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('semestre_id_seq', 12, true);


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO usuario VALUES ('ProfesorCinco', '4cab3e1f16670f9c4bc68d6b5c52dd7a', 'profesorcinco@gmail.com', 'Docente', '2015-07-12', '0', 14785258, 'pregunta', 'dfba171a2beb6f4ec3bdf8c704e45032');
INSERT INTO usuario VALUES ('Morelis', '4cab3e1f16670f9c4bc68d6b5c52dd7a', 'morelis@gmail.com', 'Docente', '2015-07-11', '0', 98745632, 'pregunta', 'dfba171a2beb6f4ec3bdf8c704e45032');
INSERT INTO usuario VALUES ('Secretaria', '4cab3e1f16670f9c4bc68d6b5c52dd7a', 'secretaria@gmail.com', 'Secretariado', '2015-07-11', '1', 12345789, 'pregunta', 'dfba171a2beb6f4ec3bdf8c704e45032');
INSERT INTO usuario VALUES ('ProfesorDos', '4cab3e1f16670f9c4bc68d6b5c52dd7a', 'profesordos@gmail.com', 'Docente', '2015-07-12', '1', 36985214, 'pregunta', 'dfba171a2beb6f4ec3bdf8c704e45032');
INSERT INTO usuario VALUES ('ProfesorCuatro', 'd41d8cd98f00b204e9800998ecf8427e', 'miguelangel.bux@gmail.com', 'Docente', '2015-07-18', '0', 12365478, NULL, NULL);
INSERT INTO usuario VALUES ('Miguel', '4cab3e1f16670f9c4bc68d6b5c52dd7a', 'miguel__salazar@hotmail.com', 'Administrador', '2015-07-11', '0', 21011917, 'Mascota favorita', 'fe5e7f89e951ab958dba7252caecf273');


--
-- Name: calificacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY calificacion
    ADD CONSTRAINT calificacion_pkey PRIMARY KEY (id);


--
-- Name: ciudad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY ciudad
    ADD CONSTRAINT ciudad_pkey PRIMARY KEY (id);


--
-- Name: datos_peesonales_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY datos_personales
    ADD CONSTRAINT datos_peesonales_pkey PRIMARY KEY (dni);


--
-- Name: docente_asignatura_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY docente_asignatura
    ADD CONSTRAINT docente_asignatura_pkey PRIMARY KEY (id);


--
-- Name: docente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY docente
    ADD CONSTRAINT docente_pkey PRIMARY KEY (dni);


--
-- Name: estado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY estado
    ADD CONSTRAINT estado_pkey PRIMARY KEY (id);


--
-- Name: estudiante_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY estudiante
    ADD CONSTRAINT estudiante_pkey PRIMARY KEY (dni);


--
-- Name: fecha_asignatura_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY horario_asignatura
    ADD CONSTRAINT fecha_asignatura_pkey PRIMARY KEY (id);


--
-- Name: historial_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY historial
    ADD CONSTRAINT historial_pkey PRIMARY KEY (id);


--
-- Name: horas_asignatura_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY horas_asignatura
    ADD CONSTRAINT horas_asignatura_pkey PRIMARY KEY (id);


--
-- Name: inscripcion_asignatura_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inscripcion_asignatura
    ADD CONSTRAINT inscripcion_asignatura_pkey PRIMARY KEY (id);


--
-- Name: inscripcion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inscripcion
    ADD CONSTRAINT inscripcion_pkey PRIMARY KEY (id);


--
-- Name: institucion_escolar_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY institucion_escolar
    ADD CONSTRAINT institucion_escolar_pkey PRIMARY KEY (id);


--
-- Name: materia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY asignatura
    ADD CONSTRAINT materia_pkey PRIMARY KEY (codigo);


--
-- Name: municipio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT municipio_pkey PRIMARY KEY (id);


--
-- Name: nota_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY nota
    ADD CONSTRAINT nota_pkey PRIMARY KEY (id);


--
-- Name: periodo_academico_periodo_academico_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY periodo_academico
    ADD CONSTRAINT periodo_academico_periodo_academico_key UNIQUE (periodo_academico);


--
-- Name: periodo_academico_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY periodo_academico
    ADD CONSTRAINT periodo_academico_pkey PRIMARY KEY (id);


--
-- Name: record_academico_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY record_academico
    ADD CONSTRAINT record_academico_pkey PRIMARY KEY (id);


--
-- Name: seccion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY seccion
    ADD CONSTRAINT seccion_pkey PRIMARY KEY (codigo);


--
-- Name: secretariado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY secretariado
    ADD CONSTRAINT secretariado_pkey PRIMARY KEY (dni);


--
-- Name: semestre_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY semestre
    ADD CONSTRAINT semestre_pkey PRIMARY KEY (id);


--
-- Name: usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (usuario);


--
-- Name: calificacion_codigo_asignatura_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY calificacion
    ADD CONSTRAINT calificacion_codigo_asignatura_fkey FOREIGN KEY (codigo_asignatura) REFERENCES asignatura(codigo) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: calificacion_dni_estudiante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY calificacion
    ADD CONSTRAINT calificacion_dni_estudiante_fkey FOREIGN KEY (dni_estudiante) REFERENCES estudiante(dni) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: calificacion_id_inscripcion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY calificacion
    ADD CONSTRAINT calificacion_id_inscripcion_fkey FOREIGN KEY (id_inscripcion) REFERENCES inscripcion(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: ciudad_id_estado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ciudad
    ADD CONSTRAINT ciudad_id_estado_fkey FOREIGN KEY (id_estado) REFERENCES estado(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: docente_asignatura_dni_docente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY docente_asignatura
    ADD CONSTRAINT docente_asignatura_dni_docente_fkey FOREIGN KEY (dni_docente) REFERENCES docente(dni) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: docente_asignatura_id_fecha_asignatura_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY docente_asignatura
    ADD CONSTRAINT docente_asignatura_id_fecha_asignatura_fkey FOREIGN KEY (id_horario_asignatura) REFERENCES horario_asignatura(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: docente_dni_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY docente
    ADD CONSTRAINT docente_dni_fkey FOREIGN KEY (dni) REFERENCES datos_personales(dni) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estudiante_dni_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estudiante
    ADD CONSTRAINT estudiante_dni_fkey FOREIGN KEY (dni) REFERENCES datos_personales(dni) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estudiante_id_estado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estudiante
    ADD CONSTRAINT estudiante_id_estado_fkey FOREIGN KEY (id_estado) REFERENCES estado(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fecha_asignatura_codigo_asignatura_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY horario_asignatura
    ADD CONSTRAINT fecha_asignatura_codigo_asignatura_fkey FOREIGN KEY (codigo_asignatura) REFERENCES asignatura(codigo) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fecha_asignatura_codigo_seccion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY horario_asignatura
    ADD CONSTRAINT fecha_asignatura_codigo_seccion_fkey FOREIGN KEY (codigo_seccion) REFERENCES seccion(codigo) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: historial_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY historial
    ADD CONSTRAINT historial_usuario_fkey FOREIGN KEY (usuario) REFERENCES usuario(usuario) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: horas_asignatura_id_horario_asignatura_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY horas_asignatura
    ADD CONSTRAINT horas_asignatura_id_horario_asignatura_fkey FOREIGN KEY (id_horario_asignatura) REFERENCES horario_asignatura(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inscripcion_asignatura_id_fecha_asignatura_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inscripcion_asignatura
    ADD CONSTRAINT inscripcion_asignatura_id_fecha_asignatura_fkey FOREIGN KEY (id_horario_asignatura) REFERENCES horario_asignatura(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inscripcion_asignatura_id_inscripcion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inscripcion_asignatura
    ADD CONSTRAINT inscripcion_asignatura_id_inscripcion_fkey FOREIGN KEY (id_inscripcion) REFERENCES inscripcion(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inscripcion_dni_estudiante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inscripcion
    ADD CONSTRAINT inscripcion_dni_estudiante_fkey FOREIGN KEY (dni_estudiante) REFERENCES estudiante(dni) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inscripcion_dni_responsable_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inscripcion
    ADD CONSTRAINT inscripcion_dni_responsable_fkey FOREIGN KEY (dni_responsable) REFERENCES datos_personales(dni) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: institucion_escolar_id_ciudad_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY institucion_escolar
    ADD CONSTRAINT institucion_escolar_id_ciudad_fkey FOREIGN KEY (id_ciudad) REFERENCES ciudad(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: materia_id_semestre_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY asignatura
    ADD CONSTRAINT materia_id_semestre_fkey FOREIGN KEY (id_semestre) REFERENCES semestre(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: municipio_id_municipio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT municipio_id_municipio_fkey FOREIGN KEY (id_municipio) REFERENCES municipio(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: nota_id_calificacion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY nota
    ADD CONSTRAINT nota_id_calificacion_fkey FOREIGN KEY (id_calificacion) REFERENCES calificacion(id);


--
-- Name: record_academico_codigo_asignatura_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY record_academico
    ADD CONSTRAINT record_academico_codigo_asignatura_fkey FOREIGN KEY (codigo_asignatura) REFERENCES asignatura(codigo) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: record_academico_dni_estudiante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY record_academico
    ADD CONSTRAINT record_academico_dni_estudiante_fkey FOREIGN KEY (dni_estudiante) REFERENCES estudiante(dni) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: record_academico_id_institucion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY record_academico
    ADD CONSTRAINT record_academico_id_institucion_fkey FOREIGN KEY (id_institucion) REFERENCES institucion_escolar(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: seccion_id_semestre_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY seccion
    ADD CONSTRAINT seccion_id_semestre_fkey FOREIGN KEY (id_semestre) REFERENCES semestre(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: secretariado_dni_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY secretariado
    ADD CONSTRAINT secretariado_dni_fkey FOREIGN KEY (dni) REFERENCES datos_personales(dni) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: usuario_dni_persona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_dni_persona_fkey FOREIGN KEY (dni_persona) REFERENCES datos_personales(dni) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

