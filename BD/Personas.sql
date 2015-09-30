-- Table: personas

-- DROP TABLE personas;

CREATE TABLE personas
(
  nombre character varying(50) NOT NULL,
  apellido1 character varying(50) NOT NULL,
  apellido2 character varying(50) NOT NULL,
  usuario character varying(50) NOT NULL,
  password character varying(50) NOT NULL,
  genero character(1) NOT NULL,
  "fechaIngreso" date NOT NULL,
  empresa character varying(50),
  amigos text[],
  foto character varying(150),
  CONSTRAINT personas_pkey PRIMARY KEY (usuario)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE personas
  OWNER TO postgres;
