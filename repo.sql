CREATE TABLE public.akademik
(
  id SERIAL,
  nama_kegiatan character varying(30),
  deskripsi character varying(500),
  surat_penugasan character varying(50),
  bukti_kinerja character varying(500),
  url character varying(30),
  thaka integer,
  tgl date,
  created_at timestamp without time zone,
  updated_at timestamp without time zone,
  created_by character varying(20),
  updated_by character varying(20),
  deleted_at timestamp without time zone,
  nip_dosen character varying(13) NOT NULL,
  CONSTRAINT pk_id_akademik PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.akademik
  OWNER TO postgres;


CREATE TABLE public.kegiatan_penunjang
(
  id SERIAL,
  nama_kegiatan character varying(30),
  deskripsi character varying(500),
  surat_penugasan character varying(50),
  bukti_kinerja character varying(500),
  url character varying(30),
  thaka integer,
  tgl date,
  created_at timestamp without time zone,
  updated_at timestamp without time zone,
  created_by character varying(20),
  updated_by character varying(20),
  deleted_at timestamp without time zone,
  nip_dosen character varying(13) NOT NULL,
  CONSTRAINT pk_id_kegiatan_penunjang PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.kegiatan_penunjang
  OWNER TO postgres;


  CREATE TABLE public.penelitian
(
  id SERIAL,
  nama_kegiatan character varying(30),
  deskripsi character varying(500),
  surat_penugasan character varying(50),
  bukti_kinerja character varying(500),
  url character varying(30),
  thaka integer,
  tgl date,
  created_at timestamp without time zone,
  updated_at timestamp without time zone,
  created_by character varying(20),
  updated_by character varying(20),
  deleted_at timestamp without time zone,
  nip_dosen character varying(13) NOT NULL,
  CONSTRAINT pk_id_penelitian PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.penelitian
  OWNER TO postgres;


  CREATE TABLE public.pengabdian
(
  id SERIAL,
  nama_kegiatan character varying(30),
  deskripsi character varying(500),
  surat_penugasan character varying(50),
  bukti_kinerja character varying(500),
  url character varying(30),
  thaka integer,
  tgl date,
  created_at date,
  updated_at date,
  created_by character varying(20),
  updated_by character varying(20),
  deleted_at timestamp without time zone,
  nip_dosen character varying(13) NOT NULL,
  CONSTRAINT pk_id_pengabdian PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.pengabdian
  OWNER TO postgres;

