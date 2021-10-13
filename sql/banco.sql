CREATE DATABASE DBControlePlantio;
--Primeira planilha Controle plantio
CREATE TABLE IF NOT EXISTS public.usuario
(
    usuario_id serial NOT NULL,
    usuario character varying(200) NOT NULL,
    senha character varying(32) NOT NULL,
    PRIMARY KEY (usuario_id)
)
WITH (
    OIDS = FALSE
);

ALTER TABLE public.usuario
    OWNER to fgmaiss;

--insert into usuario (usuario, senha) values ('guilherme', md5('123'));




CREATE TABLE IF NOT EXISTS public.entradas
(
    id serial NOT NULL,
    cliente character varying(20) NOT NULL,
    numero_entrada character varying(6) NOT NULL,
    data_entrada date NOT NULL,
    valor_total numeric(15, 2) NOT NULL,
    usuario_logado character varying(256) NOT NULL,
    PRIMARY KEY (id)
)
WITH (
    OIDS = FALSE
);

ALTER TABLE public.entradas
    OWNER to fgmaiss;