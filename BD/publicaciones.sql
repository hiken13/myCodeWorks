-- Table: publicaciones

-- DROP TABLE publicaciones;

CREATE TABLE publicaciones
(
  usuario character varying(50),
  descripcion character varying(150),
  lenguaje character varying(50),
  codigo character varying(22500),
  id serial NOT NULL,
  CONSTRAINT publicaciones_pkey PRIMARY KEY (id),
  CONSTRAINT publicaciones_id_fkey FOREIGN KEY (usuario)
      REFERENCES personas (usuario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE publicaciones
  OWNER TO postgres;
