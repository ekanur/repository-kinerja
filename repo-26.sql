PGDMP     '        	            v            repo    10.4    10.4 �    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            �           1262    16598    repo    DATABASE     �   CREATE DATABASE repo WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United States.1252' LC_CTYPE = 'English_United States.1252';
    DROP DATABASE repo;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            �           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    12924    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            �           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    16615    akademik_id_seq    SEQUENCE     x   CREATE SEQUENCE public.akademik_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.akademik_id_seq;
       public       postgres    false    3            �            1259    16617    akademik    TABLE     �  CREATE TABLE public.akademik (
    id integer DEFAULT nextval('public.akademik_id_seq'::regclass) NOT NULL,
    nama_kegiatan character varying(250),
    deskripsi character varying(500),
    surat_penugasan character varying(1000),
    bukti_kinerja character varying(2000),
    url character varying(30),
    thaka integer,
    tgl date,
    created_at timestamp(6) without time zone,
    updated_at timestamp(6) without time zone,
    created_by character varying(20),
    updated_by character varying(20),
    deleted_at timestamp(6) without time zone,
    nip_dosen character varying(20) NOT NULL,
    kd_komp character varying,
    akhir_pelaksanaan date
);
    DROP TABLE public.akademik;
       public         postgres    false    198    3            �            1259    16768    bidang_id_seq    SEQUENCE     v   CREATE SEQUENCE public.bidang_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.bidang_id_seq;
       public       postgres    false    3            �            1259    16896    forum_ilmiah_id_seq    SEQUENCE     |   CREATE SEQUENCE public.forum_ilmiah_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.forum_ilmiah_id_seq;
       public       postgres    false    3            �            1259    16729    hibah_id_seq    SEQUENCE     u   CREATE SEQUENCE public.hibah_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.hibah_id_seq;
       public       postgres    false    3                       1259    17103 
   hki_id_seq    SEQUENCE     s   CREATE SEQUENCE public.hki_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 !   DROP SEQUENCE public.hki_id_seq;
       public       postgres    false    3            �            1259    16804    institusi_id_seq    SEQUENCE     y   CREATE SEQUENCE public.institusi_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.institusi_id_seq;
       public       postgres    false    3            �            1259    16819 
   isi_bidang    TABLE     �   CREATE TABLE public.isi_bidang (
    id integer DEFAULT nextval('public.bidang_id_seq'::regclass) NOT NULL,
    id_kategori_bidang character varying(250),
    bidang character varying(250),
    deleted_at timestamp(6) without time zone
);
    DROP TABLE public.isi_bidang;
       public         postgres    false    211    3            �            1259    16898    isi_forum_ilmiah    TABLE     �   CREATE TABLE public.isi_forum_ilmiah (
    id integer DEFAULT nextval('public.forum_ilmiah_id_seq'::regclass) NOT NULL,
    forum_ilmiah character varying(250),
    deleted_at timestamp(6) without time zone
);
 $   DROP TABLE public.isi_forum_ilmiah;
       public         postgres    false    226    3            �            1259    16861 	   isi_hibah    TABLE     �   CREATE TABLE public.isi_hibah (
    id integer DEFAULT nextval('public.hibah_id_seq'::regclass) NOT NULL,
    hibah character varying(250),
    deleted_at timestamp(6) without time zone
);
    DROP TABLE public.isi_hibah;
       public         postgres    false    207    3            �            1259    16806    isi_institusi    TABLE     �   CREATE TABLE public.isi_institusi (
    id integer DEFAULT nextval('public.institusi_id_seq'::regclass) NOT NULL,
    institusi character varying(250),
    deleted_at timestamp(6) without time zone
);
 !   DROP TABLE public.isi_institusi;
       public         postgres    false    214    3            �            1259    16912    jenis_hki_id_seq    SEQUENCE     y   CREATE SEQUENCE public.jenis_hki_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.jenis_hki_id_seq;
       public       postgres    false    3            �            1259    16914    isi_jenis_hki    TABLE     �   CREATE TABLE public.isi_jenis_hki (
    id integer DEFAULT nextval('public.jenis_hki_id_seq'::regclass) NOT NULL,
    jenis_hki character varying(250),
    deleted_at timestamp(6) without time zone
);
 !   DROP TABLE public.isi_jenis_hki;
       public         postgres    false    230    3            �            1259    16928    jenis_luaran_lain_id_seq    SEQUENCE     �   CREATE SEQUENCE public.jenis_luaran_lain_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.jenis_luaran_lain_id_seq;
       public       postgres    false    3            �            1259    16930    isi_jenis_luaran_lain    TABLE     �   CREATE TABLE public.isi_jenis_luaran_lain (
    id integer DEFAULT nextval('public.jenis_luaran_lain_id_seq'::regclass) NOT NULL,
    jenis_luaran_lain character varying(250),
    deleted_at timestamp(6) without time zone
);
 )   DROP TABLE public.isi_jenis_luaran_lain;
       public         postgres    false    234    3            �            1259    16752    jenis_penelitian_id_seq    SEQUENCE     �   CREATE SEQUENCE public.jenis_penelitian_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.jenis_penelitian_id_seq;
       public       postgres    false    3            �            1259    16882    isi_jenis_penelitian    TABLE     �   CREATE TABLE public.isi_jenis_penelitian (
    id integer DEFAULT nextval('public.jenis_penelitian_id_seq'::regclass) NOT NULL,
    jenis_penelitian character varying(250),
    deleted_at timestamp(6) without time zone
);
 (   DROP TABLE public.isi_jenis_penelitian;
       public         postgres    false    209    3            �            1259    16888    jenis_publikasi_id_seq    SEQUENCE        CREATE SEQUENCE public.jenis_publikasi_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.jenis_publikasi_id_seq;
       public       postgres    false    3            �            1259    16890    isi_jenis_publikasi    TABLE     �   CREATE TABLE public.isi_jenis_publikasi (
    id integer DEFAULT nextval('public.jenis_publikasi_id_seq'::regclass) NOT NULL,
    jenis_publikasi character varying(250),
    deleted_at timestamp without time zone,
    keterangan character varying(200)
);
 '   DROP TABLE public.isi_jenis_publikasi;
       public         postgres    false    224    3            �            1259    16760    kategori_bidang_id_seq    SEQUENCE        CREATE SEQUENCE public.kategori_bidang_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.kategori_bidang_id_seq;
       public       postgres    false    3            �            1259    16837    isi_kategori_bidang    TABLE     �   CREATE TABLE public.isi_kategori_bidang (
    id integer DEFAULT nextval('public.kategori_bidang_id_seq'::regclass) NOT NULL,
    kategori_bidang character varying(250),
    deleted_at timestamp(6) without time zone
);
 '   DROP TABLE public.isi_kategori_bidang;
       public         postgres    false    210    3            �            1259    16779    kategori_tse_id_seq    SEQUENCE     |   CREATE SEQUENCE public.kategori_tse_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.kategori_tse_id_seq;
       public       postgres    false    3            �            1259    16855    isi_kategori_tse    TABLE     �   CREATE TABLE public.isi_kategori_tse (
    id integer DEFAULT nextval('public.kategori_tse_id_seq'::regclass) NOT NULL,
    kategori_tse character varying(250),
    deleted_at timestamp(6) without time zone
);
 $   DROP TABLE public.isi_kategori_tse;
       public         postgres    false    212    3            �            1259    16870    skema_penelitian_id_seq    SEQUENCE     �   CREATE SEQUENCE public.skema_penelitian_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.skema_penelitian_id_seq;
       public       postgres    false    3            �            1259    16872    isi_skema_penelitian    TABLE       CREATE TABLE public.isi_skema_penelitian (
    id integer DEFAULT nextval('public.skema_penelitian_id_seq'::regclass) NOT NULL,
    id_hibah character varying(250),
    skema_penelitian character varying(250),
    deleted_at timestamp(6) without time zone
);
 (   DROP TABLE public.isi_skema_penelitian;
       public         postgres    false    221    3            �            1259    16964    skema_peng_id_seq    SEQUENCE     z   CREATE SEQUENCE public.skema_peng_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.skema_peng_id_seq;
       public       postgres    false    3            �            1259    16966    isi_skema_pengabdian    TABLE     �   CREATE TABLE public.isi_skema_pengabdian (
    id integer DEFAULT nextval('public.skema_peng_id_seq'::regclass) NOT NULL,
    skema_peng character varying(500) NOT NULL,
    deleted_at timestamp(6) without time zone
);
 (   DROP TABLE public.isi_skema_pengabdian;
       public         postgres    false    240    3            �            1259    16920    status_hki_id_seq    SEQUENCE     z   CREATE SEQUENCE public.status_hki_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.status_hki_id_seq;
       public       postgres    false    3            �            1259    16922    isi_status_hki    TABLE     �   CREATE TABLE public.isi_status_hki (
    id integer DEFAULT nextval('public.status_hki_id_seq'::regclass) NOT NULL,
    status_hki character varying(250),
    deleted_at timestamp(6) without time zone
);
 "   DROP TABLE public.isi_status_hki;
       public         postgres    false    232    3            �            1259    16904    status_pemakalah_id_seq    SEQUENCE     �   CREATE SEQUENCE public.status_pemakalah_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.status_pemakalah_id_seq;
       public       postgres    false    3            �            1259    16906    isi_status_pemakalah    TABLE     �   CREATE TABLE public.isi_status_pemakalah (
    id integer DEFAULT nextval('public.status_pemakalah_id_seq'::regclass) NOT NULL,
    status_pemakalah character varying(250),
    deleted_at timestamp(6) without time zone
);
 (   DROP TABLE public.isi_status_pemakalah;
       public         postgres    false    228    3            �            1259    16975    sumberdaya_id_seq    SEQUENCE     z   CREATE SEQUENCE public.sumberdaya_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.sumberdaya_id_seq;
       public       postgres    false    3            �            1259    16977    isi_sumberdaya    TABLE     �   CREATE TABLE public.isi_sumberdaya (
    id integer DEFAULT nextval('public.sumberdaya_id_seq'::regclass) NOT NULL,
    sumberdaya character varying(500) NOT NULL,
    deleted_at timestamp(6) without time zone
);
 "   DROP TABLE public.isi_sumberdaya;
       public         postgres    false    242    3            �            1259    16787 
   tse_id_seq    SEQUENCE     s   CREATE SEQUENCE public.tse_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 !   DROP SEQUENCE public.tse_id_seq;
       public       postgres    false    3            �            1259    16828    isi_tse    TABLE     �   CREATE TABLE public.isi_tse (
    id integer DEFAULT nextval('public.tse_id_seq'::regclass) NOT NULL,
    id_kategori_tse character varying(250),
    tse character varying(250),
    deleted_at timestamp(6) without time zone
);
    DROP TABLE public.isi_tse;
       public         postgres    false    213    3            �            1259    17036    jenis_penelitian    TABLE     ~   CREATE TABLE public.jenis_penelitian (
    id_jenis_penelitian integer NOT NULL,
    nama_penelitian character varying(20)
);
 $   DROP TABLE public.jenis_penelitian;
       public         postgres    false    3            �            1259    17041    jenis_pengabdian    TABLE     {   CREATE TABLE public.jenis_pengabdian (
    jenis_pengabdian integer NOT NULL,
    nama_pengabdian character varying(20)
);
 $   DROP TABLE public.jenis_pengabdian;
       public         postgres    false    3            �            1259    16626    kegiatan_penunjang    TABLE     O  CREATE TABLE public.kegiatan_penunjang (
    id integer NOT NULL,
    nama_kegiatan character varying(250),
    deskripsi character varying(500),
    surat_penugasan character varying(1000),
    bukti_kinerja character varying(2000),
    url character varying(30),
    thaka integer,
    tgl date,
    created_at timestamp(6) without time zone,
    updated_at timestamp(6) without time zone,
    created_by character varying(20),
    updated_by character varying(20),
    deleted_at timestamp(6) without time zone,
    nip_dosen character varying(20) NOT NULL,
    akhir_pelaksanaan date
);
 &   DROP TABLE public.kegiatan_penunjang;
       public         postgres    false    3                       1259    17121    lain_id_seq    SEQUENCE     t   CREATE SEQUENCE public.lain_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.lain_id_seq;
       public       postgres    false    3                        1259    17092    pemakalah_id_seq    SEQUENCE     y   CREATE SEQUENCE public.pemakalah_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.pemakalah_id_seq;
       public       postgres    false    3            �            1259    16986    pen_luaran_buku_ajar_id_seq    SEQUENCE     �   CREATE SEQUENCE public.pen_luaran_buku_ajar_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.pen_luaran_buku_ajar_id_seq;
       public       postgres    false    3            �            1259    16988    pen_luaran_buku_ajar    TABLE     (  CREATE TABLE public.pen_luaran_buku_ajar (
    id integer DEFAULT nextval('public.pen_luaran_buku_ajar_id_seq'::regclass) NOT NULL,
    judul character varying(250),
    penerbit character varying(250),
    isbn character varying(250),
    jumlah_halaman character varying(250),
    sumberdana character varying(250),
    dana character varying(250),
    url character varying(250),
    tahun character varying(250),
    created_at timestamp(6) without time zone,
    created_by character varying(20),
    updated_by character varying(20),
    deleted_at timestamp(6) without time zone,
    updated_at timestamp(6) without time zone,
    nip_dosen character varying(20) NOT NULL,
    jenis_penelitian character varying(40),
    judul_penelitian character varying(500),
    abstrak character varying(8000)
);
 (   DROP TABLE public.pen_luaran_buku_ajar;
       public         postgres    false    244    3                       1259    17105    pen_luaran_hki    TABLE     !  CREATE TABLE public.pen_luaran_hki (
    id integer DEFAULT nextval('public.hki_id_seq'::regclass) NOT NULL,
    tahun character varying(250),
    jenis character varying(250),
    status character varying(250),
    judul character varying(1000),
    nomor_pendaftaran character varying(500),
    nomor_pencatatan character varying(1000),
    sumberdana character varying(500),
    dana character varying(500),
    url character varying(1000),
    created_at timestamp(6) without time zone,
    updated_at timestamp(6) without time zone,
    created_by character varying(520),
    updated_by character varying(20),
    deleted_at timestamp(6) without time zone,
    nip_dosen character varying(520) NOT NULL,
    jenis_penelitian character varying(540),
    judul_penelitian character varying(500)
);
 "   DROP TABLE public.pen_luaran_hki;
       public         postgres    false    258    3            �            1259    17057    pen_luaran_jurnal_id_seq    SEQUENCE     �   CREATE SEQUENCE public.pen_luaran_jurnal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.pen_luaran_jurnal_id_seq;
       public       postgres    false    3            �            1259    17049    pen_luaran_jurnal    TABLE       CREATE TABLE public.pen_luaran_jurnal (
    id integer DEFAULT nextval('public.pen_luaran_jurnal_id_seq'::regclass) NOT NULL,
    judul character varying(500),
    penulis_publikasi character varying(200),
    nama_jurnal character varying(300),
    jenis_publikasi character varying(200),
    e_issn character varying(200),
    volume character varying(200),
    nomor character varying(200),
    halaman_awal character varying(200),
    halaman_akhir character varying(200),
    tahun character varying(200),
    sumberdana character varying(200),
    dana character varying(200),
    url character varying(200),
    created_at timestamp without time zone,
    created_by character varying(100),
    updated_by character varying(20),
    deleted_at timestamp without time zone,
    updated_at timestamp without time zone,
    nip_dosen character varying(100),
    jenis_penelitian character varying(100),
    judul_penelitian character varying(400),
    abstrak character varying(9000),
    p_issn character varying(200)
);
 %   DROP TABLE public.pen_luaran_jurnal;
       public         postgres    false    253    3                       1259    17123    pen_luaran_lain    TABLE     �  CREATE TABLE public.pen_luaran_lain (
    id integer DEFAULT nextval('public.lain_id_seq'::regclass) NOT NULL,
    tahun character varying(250),
    jenis character varying(250),
    judul character varying(1000),
    deskripsi character varying(500),
    sumberdana character varying(500),
    dana character varying(500),
    url character varying(1000),
    created_at timestamp(6) without time zone,
    updated_at timestamp(6) without time zone,
    created_by character varying(520),
    updated_by character varying(20),
    deleted_at timestamp(6) without time zone,
    nip_dosen character varying(520) NOT NULL,
    jenis_penelitian character varying(540),
    judul_penelitian character varying(500)
);
 #   DROP TABLE public.pen_luaran_lain;
       public         postgres    false    260    3                       1259    17094    pen_luaran_pemakalah    TABLE     �  CREATE TABLE public.pen_luaran_pemakalah (
    id integer DEFAULT nextval('public.pemakalah_id_seq'::regclass) NOT NULL,
    tahun character varying(250),
    forum_ilmiah character varying(250),
    status character varying(250),
    judul character varying(1000),
    nama_forum character varying(500),
    ins_penyelenggara character varying(1000),
    tempat character varying(1000),
    sumberdana character varying(500),
    dana character varying(500),
    url character varying(1000),
    created_at timestamp(6) without time zone,
    updated_at timestamp(6) without time zone,
    created_by character varying(520),
    updated_by character varying(20),
    deleted_at timestamp(6) without time zone,
    nip_dosen character varying(520) NOT NULL,
    jenis_penelitian character varying(540),
    judul_penelitian character varying(500),
    waktu_mulai date,
    waktu_selesai date
);
 (   DROP TABLE public.pen_luaran_pemakalah;
       public         postgres    false    256    3            �            1259    16634    penelitian_id_seq    SEQUENCE     z   CREATE SEQUENCE public.penelitian_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.penelitian_id_seq;
       public       postgres    false    3            �            1259    17009 
   penelitian    TABLE     �  CREATE TABLE public.penelitian (
    id integer DEFAULT nextval('public.penelitian_id_seq'::regclass) NOT NULL,
    nama_kegiatan character varying(250),
    deskripsi character varying(500),
    surat_penugasan character varying(1000),
    bukti_kinerja character varying(2000),
    url character varying,
    thaka integer,
    tgl date,
    created_at timestamp(6) without time zone,
    updated_at timestamp(6) without time zone,
    created_by character varying(20),
    updated_by character varying(20),
    deleted_at timestamp(6) without time zone,
    nip_dosen character varying(20) NOT NULL,
    id_litabmas character varying(40),
    akhir_pelaksanaan date
);
    DROP TABLE public.penelitian;
       public         postgres    false    201    3            �            1259    16658    penelitian_dilitabmas_id_seq    SEQUENCE     �   CREATE SEQUENCE public.penelitian_dilitabmas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.penelitian_dilitabmas_id_seq;
       public       postgres    false    3            �            1259    16699    penelitian_dilitabmas    TABLE       CREATE TABLE public.penelitian_dilitabmas (
    id integer DEFAULT nextval('public.penelitian_dilitabmas_id_seq'::regclass) NOT NULL,
    judul character varying(250),
    ketua character varying(250),
    anggota_1 character varying(250),
    anggota_2 character varying(250),
    anggota_3 character varying(250),
    anggota_4 character varying(250),
    anggota_5 character varying(250),
    hibah character varying(250),
    skema character varying(250),
    kategori_bidang character varying(250),
    bidang character varying(250),
    kategori_tse character varying(250),
    tse character varying(250),
    dana character varying(250),
    url character varying(250),
    created_at timestamp(6) without time zone,
    updated_at timestamp(6) without time zone,
    created_by character varying(20),
    updated_by character varying(20),
    deleted_at timestamp(6) without time zone,
    nip_dosen character varying(20) NOT NULL,
    jenis_penelitian character varying(40),
    abstrak character varying(5000),
    tahun integer
);
 )   DROP TABLE public.penelitian_dilitabmas;
       public         postgres    false    203    3            �            1259    16669     penelitian_non_dilitabmas_id_seq    SEQUENCE     �   CREATE SEQUENCE public.penelitian_non_dilitabmas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 7   DROP SEQUENCE public.penelitian_non_dilitabmas_id_seq;
       public       postgres    false    3            �            1259    16717    penelitian_non_dilitabmas    TABLE     �  CREATE TABLE public.penelitian_non_dilitabmas (
    id integer DEFAULT nextval('public.penelitian_non_dilitabmas_id_seq'::regclass) NOT NULL,
    judul character varying(250),
    ketua character varying(250),
    anggota_1 character varying(250),
    anggota_2 character varying(250),
    anggota_3 character varying(250),
    anggota_4 character varying(250),
    anggota_5 character varying(250),
    isi_jenis_penelitian character varying(250),
    skema character varying(250),
    kategori_bidang character varying(250),
    bidang character varying(250),
    kategori_tse character varying(250),
    tse character varying(250),
    ins_sumber_dana character varying(250),
    sumber_dana character varying(250),
    dana character varying(250),
    url character varying(250),
    created_at timestamp(6) without time zone,
    updated_at timestamp(6) without time zone,
    created_by character varying(20),
    updated_by character varying(20),
    deleted_at timestamp(6) without time zone,
    nip_dosen character varying(20) NOT NULL,
    jenis_penelitian character varying(100),
    abstrak character varying(7000) DEFAULT '-1'::integer,
    tahun integer
);
 -   DROP TABLE public.penelitian_non_dilitabmas;
       public         postgres    false    204    3            
           1259    17193    peng_hki_id_seq    SEQUENCE     x   CREATE SEQUENCE public.peng_hki_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.peng_hki_id_seq;
       public       postgres    false    3                       1259    17181    peng_lain_id_seq    SEQUENCE     y   CREATE SEQUENCE public.peng_lain_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.peng_lain_id_seq;
       public       postgres    false    3            �            1259    16998    peng_luaran_buku_ajar_id_seq    SEQUENCE     �   CREATE SEQUENCE public.peng_luaran_buku_ajar_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.peng_luaran_buku_ajar_id_seq;
       public       postgres    false    3            �            1259    17000    peng_luaran_buku_ajar    TABLE     ,  CREATE TABLE public.peng_luaran_buku_ajar (
    id integer DEFAULT nextval('public.peng_luaran_buku_ajar_id_seq'::regclass) NOT NULL,
    judul character varying(1000),
    penerbit character varying(250),
    isbn character varying(250),
    jumlah_halaman character varying(250),
    sumberdana character varying(250),
    dana character varying(250),
    url character varying(250),
    tahun character varying(250),
    created_at timestamp(6) without time zone,
    created_by character varying(20),
    updated_by character varying(20),
    deleted_at timestamp(6) without time zone,
    updated_at timestamp(6) without time zone,
    nip_dosen character varying(20) NOT NULL,
    jenis_pengabdian character varying(200),
    judul_pengabdian character varying(300),
    abstrak character varying(7000)
);
 )   DROP TABLE public.peng_luaran_buku_ajar;
       public         postgres    false    246    3                       1259    17195    peng_luaran_hki    TABLE     '  CREATE TABLE public.peng_luaran_hki (
    id integer DEFAULT nextval('public.peng_hki_id_seq'::regclass) NOT NULL,
    tahun character varying(250),
    jenis character varying(250),
    status character varying(250),
    judul character varying(1000),
    nomor_pendaftaran character varying(500),
    nomor_pencatatan character varying(1000),
    sumberdana character varying(500),
    dana character varying(500),
    url character varying(1000),
    created_at timestamp(6) without time zone,
    updated_at timestamp(6) without time zone,
    created_by character varying(520),
    updated_by character varying(20),
    deleted_at timestamp(6) without time zone,
    nip_dosen character varying(520) NOT NULL,
    jenis_pengabdian character varying(540),
    judul_pengabdian character varying(500)
);
 #   DROP TABLE public.peng_luaran_hki;
       public         postgres    false    266    3            �            1259    17068    peng_luaran_jurnal_id_seq    SEQUENCE     �   CREATE SEQUENCE public.peng_luaran_jurnal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.peng_luaran_jurnal_id_seq;
       public       postgres    false    3            �            1259    17070    peng_luaran_jurnal    TABLE       CREATE TABLE public.peng_luaran_jurnal (
    id integer DEFAULT nextval('public.peng_luaran_jurnal_id_seq'::regclass) NOT NULL,
    penulis_publikasi character varying(250),
    nama_jurnal character varying(250),
    jenis_publikasi character varying(250),
    p_issn character varying(250),
    nomor character varying(250),
    volume character varying(250),
    halaman_awal character varying(250),
    halaman_akhir character varying(250),
    tahun character varying(250),
    sumberdana character varying(250),
    dana character varying(250),
    url character varying(250),
    created_at timestamp(6) without time zone,
    updated_at timestamp(6) without time zone,
    created_by character varying(20),
    updated_by character varying(20),
    deleted_at timestamp(6) without time zone,
    nip_dosen character varying(200) NOT NULL,
    jenis_pengabdian character varying(250),
    judul_pengabdian character varying(250),
    judul character varying(200),
    e_issn character varying(200),
    abstrak character varying(9000)
);
 &   DROP TABLE public.peng_luaran_jurnal;
       public         postgres    false    254    3            	           1259    17183    peng_luaran_lain    TABLE     �  CREATE TABLE public.peng_luaran_lain (
    id integer DEFAULT nextval('public.peng_lain_id_seq'::regclass) NOT NULL,
    tahun character varying(250),
    jenis character varying(250),
    judul character varying(1000),
    deskripsi character varying(500),
    sumberdana character varying(500),
    dana character varying(500),
    url character varying(1000),
    created_at timestamp(6) without time zone,
    updated_at timestamp(6) without time zone,
    created_by character varying(520),
    updated_by character varying(20),
    deleted_at timestamp(6) without time zone,
    nip_dosen character varying(520) NOT NULL,
    jenis_pengabdian character varying(540),
    judul_pengabdian character varying(500)
);
 $   DROP TABLE public.peng_luaran_lain;
       public         postgres    false    264    3            �           0    0 (   COLUMN peng_luaran_lain.jenis_pengabdian    COMMENT     L   COMMENT ON COLUMN public.peng_luaran_lain.jenis_pengabdian IS 'pengabdian';
            public       postgres    false    265                       1259    17170    peng_pemakalah_id_seq    SEQUENCE     ~   CREATE SEQUENCE public.peng_pemakalah_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.peng_pemakalah_id_seq;
       public       postgres    false    3                       1259    17172    peng_luaran_pemakalah    TABLE     �  CREATE TABLE public.peng_luaran_pemakalah (
    id integer DEFAULT nextval('public.peng_pemakalah_id_seq'::regclass) NOT NULL,
    tahun character varying(250),
    forum_ilmiah character varying(250),
    status character varying(250),
    judul character varying(1000),
    nama_forum character varying(500),
    ins_penyelenggara character varying(1000),
    tempat character varying(1000),
    sumberdana character varying(500),
    dana character varying(500),
    url character varying(1000),
    created_at timestamp(6) without time zone,
    updated_at timestamp(6) without time zone,
    created_by character varying(520),
    updated_by character varying(20),
    deleted_at timestamp(6) without time zone,
    nip_dosen character varying(520) NOT NULL,
    jenis_pengabdian character varying(540),
    judul_pengabdian character varying(500),
    waktu_mulai date,
    waktu_selesai date
);
 )   DROP TABLE public.peng_luaran_pemakalah;
       public         postgres    false    262    3            �            1259    16645    pengabdian_id_seq    SEQUENCE     z   CREATE SEQUENCE public.pengabdian_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.pengabdian_id_seq;
       public       postgres    false    3            �            1259    17018 
   pengabdian    TABLE     �  CREATE TABLE public.pengabdian (
    id integer DEFAULT nextval('public.pengabdian_id_seq'::regclass) NOT NULL,
    nama_kegiatan character varying(250),
    deskripsi character varying(500),
    surat_penugasan character varying(1000),
    bukti_kinerja character varying(2000),
    url character varying(30),
    thaka integer,
    tgl date,
    created_at timestamp(6) without time zone,
    updated_at timestamp(6) without time zone,
    created_by character varying(20),
    updated_by character varying(20),
    deleted_at timestamp(6) without time zone,
    nip_dosen character varying(20) NOT NULL,
    id_litabmas character varying(40),
    akhir_pelaksanaan date
);
    DROP TABLE public.pengabdian;
       public         postgres    false    202    3            �            1259    16936    pengabdian_dilitabmas_id_seq    SEQUENCE     �   CREATE SEQUENCE public.pengabdian_dilitabmas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.pengabdian_dilitabmas_id_seq;
       public       postgres    false    3            �            1259    16938    pengabdian_dilitabmas    TABLE     N  CREATE TABLE public.pengabdian_dilitabmas (
    id integer DEFAULT nextval('public.pengabdian_dilitabmas_id_seq'::regclass) NOT NULL,
    judul character varying(500),
    ketua character varying(250),
    anggota_1 character varying(250),
    anggota_2 character varying(250),
    anggota_3 character varying(250),
    anggota_4 character varying(250),
    anggota_5 character varying(250),
    skema character varying(250),
    sumberdaya_iptek character varying(250),
    lama_kegiatan character varying(250),
    jumlah_mahasiswa character varying(250),
    jumlah_alumni character varying(250),
    jumlah_staf character varying(250),
    sumber_dana character varying(250),
    dana character varying(250),
    url character varying(250),
    created_at timestamp(6) without time zone,
    created_by character varying(20),
    updated_by character varying(20),
    deleted_at timestamp(6) without time zone,
    nip_dosen character varying(20) NOT NULL,
    jenis_pengabdian character varying(100),
    updated_at character varying(20),
    abstrak character varying(7000),
    tahun integer
);
 )   DROP TABLE public.pengabdian_dilitabmas;
       public         postgres    false    236    3            �            1259    16947     pengabdian_non_dilitabmas_id_seq    SEQUENCE     �   CREATE SEQUENCE public.pengabdian_non_dilitabmas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 7   DROP SEQUENCE public.pengabdian_non_dilitabmas_id_seq;
       public       postgres    false    3            �            1259    16949    pengabdian_non_dilitabmas    TABLE     �  CREATE TABLE public.pengabdian_non_dilitabmas (
    id integer DEFAULT nextval('public.pengabdian_non_dilitabmas_id_seq'::regclass) NOT NULL,
    judul character varying(500),
    ketua character varying(250),
    anggota_1 character varying(250),
    anggota_2 character varying(250),
    anggota_3 character varying(250),
    anggota_4 character varying(250),
    anggota_5 character varying(250),
    isi_jenis_pengabdian character varying(250),
    skema character varying(250),
    sumberdaya_iptek character varying(250),
    tahun_mulai character varying(250),
    tahun_selesai character varying(250),
    tahun_ke character varying(250),
    jumlah_mahasiswa character varying(250),
    jumlah_alumni character varying(250),
    jumlah_staf character varying(250),
    sumber_dana character varying(250),
    dana character varying(250),
    url character varying(250),
    created_at timestamp(6) without time zone,
    created_by character varying(20),
    updated_by character varying(20),
    deleted_at timestamp(6) without time zone,
    nip_dosen character varying(20) NOT NULL,
    jenis_pengabdian character varying(40),
    updated_at character varying(20),
    abstrak character varying(7000),
    tahun integer
);
 -   DROP TABLE public.pengabdian_non_dilitabmas;
       public         postgres    false    238    3            �            1259    16744    skema_id_seq    SEQUENCE     u   CREATE SEQUENCE public.skema_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.skema_id_seq;
       public       postgres    false    3            �            1259    16602 
   userid_fak    TABLE       CREATE TABLE public.userid_fak (
    user_id character varying(20) NOT NULL,
    user_fak character varying(2),
    user_level integer,
    status integer,
    user_jur character varying(3),
    deleted_at timestamp(6) without time zone,
    fak_nm character varying(12)
);
    DROP TABLE public.userid_fak;
       public         postgres    false    3            �            1259    16607    verifikator    TABLE     y   CREATE TABLE public.verifikator (
    nip_dosen character varying(20) NOT NULL,
    verifikator character varying(20)
);
    DROP TABLE public.verifikator;
       public         postgres    false    3            E          0    16617    akademik 
   TABLE DATA               �   COPY public.akademik (id, nama_kegiatan, deskripsi, surat_penugasan, bukti_kinerja, url, thaka, tgl, created_at, updated_at, created_by, updated_by, deleted_at, nip_dosen, kd_komp, akhir_pelaksanaan) FROM stdin;
    public       postgres    false    199   �      V          0    16819 
   isi_bidang 
   TABLE DATA               P   COPY public.isi_bidang (id, id_kategori_bidang, bidang, deleted_at) FROM stdin;
    public       postgres    false    216   g      a          0    16898    isi_forum_ilmiah 
   TABLE DATA               H   COPY public.isi_forum_ilmiah (id, forum_ilmiah, deleted_at) FROM stdin;
    public       postgres    false    227   b      Z          0    16861 	   isi_hibah 
   TABLE DATA               :   COPY public.isi_hibah (id, hibah, deleted_at) FROM stdin;
    public       postgres    false    220   �      U          0    16806    isi_institusi 
   TABLE DATA               B   COPY public.isi_institusi (id, institusi, deleted_at) FROM stdin;
    public       postgres    false    215   �      e          0    16914    isi_jenis_hki 
   TABLE DATA               B   COPY public.isi_jenis_hki (id, jenis_hki, deleted_at) FROM stdin;
    public       postgres    false    231   �      i          0    16930    isi_jenis_luaran_lain 
   TABLE DATA               R   COPY public.isi_jenis_luaran_lain (id, jenis_luaran_lain, deleted_at) FROM stdin;
    public       postgres    false    235   G      ]          0    16882    isi_jenis_penelitian 
   TABLE DATA               P   COPY public.isi_jenis_penelitian (id, jenis_penelitian, deleted_at) FROM stdin;
    public       postgres    false    223   �      _          0    16890    isi_jenis_publikasi 
   TABLE DATA               Z   COPY public.isi_jenis_publikasi (id, jenis_publikasi, deleted_at, keterangan) FROM stdin;
    public       postgres    false    225   �      X          0    16837    isi_kategori_bidang 
   TABLE DATA               N   COPY public.isi_kategori_bidang (id, kategori_bidang, deleted_at) FROM stdin;
    public       postgres    false    218   {      Y          0    16855    isi_kategori_tse 
   TABLE DATA               H   COPY public.isi_kategori_tse (id, kategori_tse, deleted_at) FROM stdin;
    public       postgres    false    219   Q      \          0    16872    isi_skema_penelitian 
   TABLE DATA               Z   COPY public.isi_skema_penelitian (id, id_hibah, skema_penelitian, deleted_at) FROM stdin;
    public       postgres    false    222   �      o          0    16966    isi_skema_pengabdian 
   TABLE DATA               J   COPY public.isi_skema_pengabdian (id, skema_peng, deleted_at) FROM stdin;
    public       postgres    false    241   �       g          0    16922    isi_status_hki 
   TABLE DATA               D   COPY public.isi_status_hki (id, status_hki, deleted_at) FROM stdin;
    public       postgres    false    233   �!      c          0    16906    isi_status_pemakalah 
   TABLE DATA               P   COPY public.isi_status_pemakalah (id, status_pemakalah, deleted_at) FROM stdin;
    public       postgres    false    229   �!      q          0    16977    isi_sumberdaya 
   TABLE DATA               D   COPY public.isi_sumberdaya (id, sumberdaya, deleted_at) FROM stdin;
    public       postgres    false    243   G"      W          0    16828    isi_tse 
   TABLE DATA               G   COPY public.isi_tse (id, id_kategori_tse, tse, deleted_at) FROM stdin;
    public       postgres    false    217   [#      x          0    17036    jenis_penelitian 
   TABLE DATA               P   COPY public.jenis_penelitian (id_jenis_penelitian, nama_penelitian) FROM stdin;
    public       postgres    false    250    ,      y          0    17041    jenis_pengabdian 
   TABLE DATA               M   COPY public.jenis_pengabdian (jenis_pengabdian, nama_pengabdian) FROM stdin;
    public       postgres    false    251   Z,      F          0    16626    kegiatan_penunjang 
   TABLE DATA               �   COPY public.kegiatan_penunjang (id, nama_kegiatan, deskripsi, surat_penugasan, bukti_kinerja, url, thaka, tgl, created_at, updated_at, created_by, updated_by, deleted_at, nip_dosen, akhir_pelaksanaan) FROM stdin;
    public       postgres    false    200   �,      s          0    16988    pen_luaran_buku_ajar 
   TABLE DATA               �   COPY public.pen_luaran_buku_ajar (id, judul, penerbit, isbn, jumlah_halaman, sumberdana, dana, url, tahun, created_at, created_by, updated_by, deleted_at, updated_at, nip_dosen, jenis_penelitian, judul_penelitian, abstrak) FROM stdin;
    public       postgres    false    245   �,      �          0    17105    pen_luaran_hki 
   TABLE DATA               �   COPY public.pen_luaran_hki (id, tahun, jenis, status, judul, nomor_pendaftaran, nomor_pencatatan, sumberdana, dana, url, created_at, updated_at, created_by, updated_by, deleted_at, nip_dosen, jenis_penelitian, judul_penelitian) FROM stdin;
    public       postgres    false    259   T.      z          0    17049    pen_luaran_jurnal 
   TABLE DATA               5  COPY public.pen_luaran_jurnal (id, judul, penulis_publikasi, nama_jurnal, jenis_publikasi, e_issn, volume, nomor, halaman_awal, halaman_akhir, tahun, sumberdana, dana, url, created_at, created_by, updated_by, deleted_at, updated_at, nip_dosen, jenis_penelitian, judul_penelitian, abstrak, p_issn) FROM stdin;
    public       postgres    false    252   �/      �          0    17123    pen_luaran_lain 
   TABLE DATA               �   COPY public.pen_luaran_lain (id, tahun, jenis, judul, deskripsi, sumberdana, dana, url, created_at, updated_at, created_by, updated_by, deleted_at, nip_dosen, jenis_penelitian, judul_penelitian) FROM stdin;
    public       postgres    false    261   �1                0    17094    pen_luaran_pemakalah 
   TABLE DATA                 COPY public.pen_luaran_pemakalah (id, tahun, forum_ilmiah, status, judul, nama_forum, ins_penyelenggara, tempat, sumberdana, dana, url, created_at, updated_at, created_by, updated_by, deleted_at, nip_dosen, jenis_penelitian, judul_penelitian, waktu_mulai, waktu_selesai) FROM stdin;
    public       postgres    false    257   �2      v          0    17009 
   penelitian 
   TABLE DATA               �   COPY public.penelitian (id, nama_kegiatan, deskripsi, surat_penugasan, bukti_kinerja, url, thaka, tgl, created_at, updated_at, created_by, updated_by, deleted_at, nip_dosen, id_litabmas, akhir_pelaksanaan) FROM stdin;
    public       postgres    false    248   W4      K          0    16699    penelitian_dilitabmas 
   TABLE DATA               &  COPY public.penelitian_dilitabmas (id, judul, ketua, anggota_1, anggota_2, anggota_3, anggota_4, anggota_5, hibah, skema, kategori_bidang, bidang, kategori_tse, tse, dana, url, created_at, updated_at, created_by, updated_by, deleted_at, nip_dosen, jenis_penelitian, abstrak, tahun) FROM stdin;
    public       postgres    false    205   �4      L          0    16717    penelitian_non_dilitabmas 
   TABLE DATA               W  COPY public.penelitian_non_dilitabmas (id, judul, ketua, anggota_1, anggota_2, anggota_3, anggota_4, anggota_5, isi_jenis_penelitian, skema, kategori_bidang, bidang, kategori_tse, tse, ins_sumber_dana, sumber_dana, dana, url, created_at, updated_at, created_by, updated_by, deleted_at, nip_dosen, jenis_penelitian, abstrak, tahun) FROM stdin;
    public       postgres    false    206   �7      u          0    17000    peng_luaran_buku_ajar 
   TABLE DATA               �   COPY public.peng_luaran_buku_ajar (id, judul, penerbit, isbn, jumlah_halaman, sumberdana, dana, url, tahun, created_at, created_by, updated_by, deleted_at, updated_at, nip_dosen, jenis_pengabdian, judul_pengabdian, abstrak) FROM stdin;
    public       postgres    false    247   �:      �          0    17195    peng_luaran_hki 
   TABLE DATA               �   COPY public.peng_luaran_hki (id, tahun, jenis, status, judul, nomor_pendaftaran, nomor_pencatatan, sumberdana, dana, url, created_at, updated_at, created_by, updated_by, deleted_at, nip_dosen, jenis_pengabdian, judul_pengabdian) FROM stdin;
    public       postgres    false    267   R<      }          0    17070    peng_luaran_jurnal 
   TABLE DATA               6  COPY public.peng_luaran_jurnal (id, penulis_publikasi, nama_jurnal, jenis_publikasi, p_issn, nomor, volume, halaman_awal, halaman_akhir, tahun, sumberdana, dana, url, created_at, updated_at, created_by, updated_by, deleted_at, nip_dosen, jenis_pengabdian, judul_pengabdian, judul, e_issn, abstrak) FROM stdin;
    public       postgres    false    255   ~=      �          0    17183    peng_luaran_lain 
   TABLE DATA               �   COPY public.peng_luaran_lain (id, tahun, jenis, judul, deskripsi, sumberdana, dana, url, created_at, updated_at, created_by, updated_by, deleted_at, nip_dosen, jenis_pengabdian, judul_pengabdian) FROM stdin;
    public       postgres    false    265   '?      �          0    17172    peng_luaran_pemakalah 
   TABLE DATA                 COPY public.peng_luaran_pemakalah (id, tahun, forum_ilmiah, status, judul, nama_forum, ins_penyelenggara, tempat, sumberdana, dana, url, created_at, updated_at, created_by, updated_by, deleted_at, nip_dosen, jenis_pengabdian, judul_pengabdian, waktu_mulai, waktu_selesai) FROM stdin;
    public       postgres    false    263   k@      w          0    17018 
   pengabdian 
   TABLE DATA               �   COPY public.pengabdian (id, nama_kegiatan, deskripsi, surat_penugasan, bukti_kinerja, url, thaka, tgl, created_at, updated_at, created_by, updated_by, deleted_at, nip_dosen, id_litabmas, akhir_pelaksanaan) FROM stdin;
    public       postgres    false    249   /A      k          0    16938    pengabdian_dilitabmas 
   TABLE DATA               O  COPY public.pengabdian_dilitabmas (id, judul, ketua, anggota_1, anggota_2, anggota_3, anggota_4, anggota_5, skema, sumberdaya_iptek, lama_kegiatan, jumlah_mahasiswa, jumlah_alumni, jumlah_staf, sumber_dana, dana, url, created_at, created_by, updated_by, deleted_at, nip_dosen, jenis_pengabdian, updated_at, abstrak, tahun) FROM stdin;
    public       postgres    false    237   LA      m          0    16949    pengabdian_non_dilitabmas 
   TABLE DATA               �  COPY public.pengabdian_non_dilitabmas (id, judul, ketua, anggota_1, anggota_2, anggota_3, anggota_4, anggota_5, isi_jenis_pengabdian, skema, sumberdaya_iptek, tahun_mulai, tahun_selesai, tahun_ke, jumlah_mahasiswa, jumlah_alumni, jumlah_staf, sumber_dana, dana, url, created_at, created_by, updated_by, deleted_at, nip_dosen, jenis_pengabdian, updated_at, abstrak, tahun) FROM stdin;
    public       postgres    false    239   SC      B          0    16602 
   userid_fak 
   TABLE DATA               i   COPY public.userid_fak (user_id, user_fak, user_level, status, user_jur, deleted_at, fak_nm) FROM stdin;
    public       postgres    false    196   E      C          0    16607    verifikator 
   TABLE DATA               =   COPY public.verifikator (nip_dosen, verifikator) FROM stdin;
    public       postgres    false    197   :H      �           0    0    akademik_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.akademik_id_seq', 4, true);
            public       postgres    false    198            �           0    0    bidang_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.bidang_id_seq', 1, false);
            public       postgres    false    211            �           0    0    forum_ilmiah_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.forum_ilmiah_id_seq', 1, false);
            public       postgres    false    226            �           0    0    hibah_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.hibah_id_seq', 2, true);
            public       postgres    false    207            �           0    0 
   hki_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('public.hki_id_seq', 11, true);
            public       postgres    false    258            �           0    0    institusi_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.institusi_id_seq', 1, false);
            public       postgres    false    214            �           0    0    jenis_hki_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.jenis_hki_id_seq', 1, false);
            public       postgres    false    230            �           0    0    jenis_luaran_lain_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.jenis_luaran_lain_id_seq', 1, false);
            public       postgres    false    234            �           0    0    jenis_penelitian_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.jenis_penelitian_id_seq', 1, false);
            public       postgres    false    209            �           0    0    jenis_publikasi_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.jenis_publikasi_id_seq', 1, false);
            public       postgres    false    224            �           0    0    kategori_bidang_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.kategori_bidang_id_seq', 1, false);
            public       postgres    false    210            �           0    0    kategori_tse_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.kategori_tse_id_seq', 1, false);
            public       postgres    false    212            �           0    0    lain_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.lain_id_seq', 15, true);
            public       postgres    false    260            �           0    0    pemakalah_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.pemakalah_id_seq', 5, true);
            public       postgres    false    256            �           0    0    pen_luaran_buku_ajar_id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.pen_luaran_buku_ajar_id_seq', 41, true);
            public       postgres    false    244            �           0    0    pen_luaran_jurnal_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.pen_luaran_jurnal_id_seq', 20, true);
            public       postgres    false    253            �           0    0    penelitian_dilitabmas_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.penelitian_dilitabmas_id_seq', 55, true);
            public       postgres    false    203            �           0    0    penelitian_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.penelitian_id_seq', 5, true);
            public       postgres    false    201            �           0    0     penelitian_non_dilitabmas_id_seq    SEQUENCE SET     O   SELECT pg_catalog.setval('public.penelitian_non_dilitabmas_id_seq', 23, true);
            public       postgres    false    204            �           0    0    peng_hki_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.peng_hki_id_seq', 3, true);
            public       postgres    false    266            �           0    0    peng_lain_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.peng_lain_id_seq', 3, true);
            public       postgres    false    264            �           0    0    peng_luaran_buku_ajar_id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.peng_luaran_buku_ajar_id_seq', 8, true);
            public       postgres    false    246            �           0    0    peng_luaran_jurnal_id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.peng_luaran_jurnal_id_seq', 13, true);
            public       postgres    false    254            �           0    0    peng_pemakalah_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.peng_pemakalah_id_seq', 4, true);
            public       postgres    false    262            �           0    0    pengabdian_dilitabmas_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.pengabdian_dilitabmas_id_seq', 16, true);
            public       postgres    false    236            �           0    0    pengabdian_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.pengabdian_id_seq', 1, false);
            public       postgres    false    202            �           0    0     pengabdian_non_dilitabmas_id_seq    SEQUENCE SET     O   SELECT pg_catalog.setval('public.pengabdian_non_dilitabmas_id_seq', 11, true);
            public       postgres    false    238            �           0    0    skema_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.skema_id_seq', 1, false);
            public       postgres    false    208            �           0    0    skema_penelitian_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.skema_penelitian_id_seq', 1, false);
            public       postgres    false    221            �           0    0    skema_peng_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.skema_peng_id_seq', 1, false);
            public       postgres    false    240            �           0    0    status_hki_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.status_hki_id_seq', 1, false);
            public       postgres    false    232            �           0    0    status_pemakalah_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.status_pemakalah_id_seq', 1, false);
            public       postgres    false    228            �           0    0    sumberdaya_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.sumberdaya_id_seq', 1, false);
            public       postgres    false    242            �           0    0 
   tse_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('public.tse_id_seq', 1, false);
            public       postgres    false    213            �           2606    17040 &   jenis_penelitian jenis_penelitian_pkey 
   CONSTRAINT     u   ALTER TABLE ONLY public.jenis_penelitian
    ADD CONSTRAINT jenis_penelitian_pkey PRIMARY KEY (id_jenis_penelitian);
 P   ALTER TABLE ONLY public.jenis_penelitian DROP CONSTRAINT jenis_penelitian_pkey;
       public         postgres    false    250            �           2606    17045 &   jenis_pengabdian jenis_pengabdian_pkey 
   CONSTRAINT     r   ALTER TABLE ONLY public.jenis_pengabdian
    ADD CONSTRAINT jenis_pengabdian_pkey PRIMARY KEY (jenis_pengabdian);
 P   ALTER TABLE ONLY public.jenis_pengabdian DROP CONSTRAINT jenis_pengabdian_pkey;
       public         postgres    false    251            �           2606    17056 (   pen_luaran_jurnal pen_luaran_jurnal_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.pen_luaran_jurnal
    ADD CONSTRAINT pen_luaran_jurnal_pkey PRIMARY KEY (id);
 R   ALTER TABLE ONLY public.pen_luaran_jurnal DROP CONSTRAINT pen_luaran_jurnal_pkey;
       public         postgres    false    252            �           2606    16625    akademik pk_id_akademik 
   CONSTRAINT     U   ALTER TABLE ONLY public.akademik
    ADD CONSTRAINT pk_id_akademik PRIMARY KEY (id);
 A   ALTER TABLE ONLY public.akademik DROP CONSTRAINT pk_id_akademik;
       public         postgres    false    199            �           2606    16827    isi_bidang pk_id_bidang 
   CONSTRAINT     U   ALTER TABLE ONLY public.isi_bidang
    ADD CONSTRAINT pk_id_bidang PRIMARY KEY (id);
 A   ALTER TABLE ONLY public.isi_bidang DROP CONSTRAINT pk_id_bidang;
       public         postgres    false    216            �           2606    16903 #   isi_forum_ilmiah pk_id_forum_ilmiah 
   CONSTRAINT     a   ALTER TABLE ONLY public.isi_forum_ilmiah
    ADD CONSTRAINT pk_id_forum_ilmiah PRIMARY KEY (id);
 M   ALTER TABLE ONLY public.isi_forum_ilmiah DROP CONSTRAINT pk_id_forum_ilmiah;
       public         postgres    false    227            �           2606    16866    isi_hibah pk_id_hibah 
   CONSTRAINT     S   ALTER TABLE ONLY public.isi_hibah
    ADD CONSTRAINT pk_id_hibah PRIMARY KEY (id);
 ?   ALTER TABLE ONLY public.isi_hibah DROP CONSTRAINT pk_id_hibah;
       public         postgres    false    220            �           2606    17113    pen_luaran_hki pk_id_hki 
   CONSTRAINT     V   ALTER TABLE ONLY public.pen_luaran_hki
    ADD CONSTRAINT pk_id_hki PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.pen_luaran_hki DROP CONSTRAINT pk_id_hki;
       public         postgres    false    259            �           2606    16811    isi_institusi pk_id_institusi 
   CONSTRAINT     [   ALTER TABLE ONLY public.isi_institusi
    ADD CONSTRAINT pk_id_institusi PRIMARY KEY (id);
 G   ALTER TABLE ONLY public.isi_institusi DROP CONSTRAINT pk_id_institusi;
       public         postgres    false    215            �           2606    16919    isi_jenis_hki pk_id_jenis_hki 
   CONSTRAINT     [   ALTER TABLE ONLY public.isi_jenis_hki
    ADD CONSTRAINT pk_id_jenis_hki PRIMARY KEY (id);
 G   ALTER TABLE ONLY public.isi_jenis_hki DROP CONSTRAINT pk_id_jenis_hki;
       public         postgres    false    231            �           2606    16935 -   isi_jenis_luaran_lain pk_id_jenis_luaran_lain 
   CONSTRAINT     k   ALTER TABLE ONLY public.isi_jenis_luaran_lain
    ADD CONSTRAINT pk_id_jenis_luaran_lain PRIMARY KEY (id);
 W   ALTER TABLE ONLY public.isi_jenis_luaran_lain DROP CONSTRAINT pk_id_jenis_luaran_lain;
       public         postgres    false    235            �           2606    16887 +   isi_jenis_penelitian pk_id_jenis_penelitian 
   CONSTRAINT     i   ALTER TABLE ONLY public.isi_jenis_penelitian
    ADD CONSTRAINT pk_id_jenis_penelitian PRIMARY KEY (id);
 U   ALTER TABLE ONLY public.isi_jenis_penelitian DROP CONSTRAINT pk_id_jenis_penelitian;
       public         postgres    false    223            �           2606    16895 )   isi_jenis_publikasi pk_id_jenis_publikasi 
   CONSTRAINT     g   ALTER TABLE ONLY public.isi_jenis_publikasi
    ADD CONSTRAINT pk_id_jenis_publikasi PRIMARY KEY (id);
 S   ALTER TABLE ONLY public.isi_jenis_publikasi DROP CONSTRAINT pk_id_jenis_publikasi;
       public         postgres    false    225            �           2606    16842 )   isi_kategori_bidang pk_id_kategori_bidang 
   CONSTRAINT     g   ALTER TABLE ONLY public.isi_kategori_bidang
    ADD CONSTRAINT pk_id_kategori_bidang PRIMARY KEY (id);
 S   ALTER TABLE ONLY public.isi_kategori_bidang DROP CONSTRAINT pk_id_kategori_bidang;
       public         postgres    false    218            �           2606    16860 #   isi_kategori_tse pk_id_kategori_tse 
   CONSTRAINT     a   ALTER TABLE ONLY public.isi_kategori_tse
    ADD CONSTRAINT pk_id_kategori_tse PRIMARY KEY (id);
 M   ALTER TABLE ONLY public.isi_kategori_tse DROP CONSTRAINT pk_id_kategori_tse;
       public         postgres    false    219            �           2606    16633 +   kegiatan_penunjang pk_id_kegiatan_penunjang 
   CONSTRAINT     i   ALTER TABLE ONLY public.kegiatan_penunjang
    ADD CONSTRAINT pk_id_kegiatan_penunjang PRIMARY KEY (id);
 U   ALTER TABLE ONLY public.kegiatan_penunjang DROP CONSTRAINT pk_id_kegiatan_penunjang;
       public         postgres    false    200            �           2606    17131    pen_luaran_lain pk_id_lain 
   CONSTRAINT     X   ALTER TABLE ONLY public.pen_luaran_lain
    ADD CONSTRAINT pk_id_lain PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.pen_luaran_lain DROP CONSTRAINT pk_id_lain;
       public         postgres    false    261            �           2606    17102 $   pen_luaran_pemakalah pk_id_pemakalah 
   CONSTRAINT     b   ALTER TABLE ONLY public.pen_luaran_pemakalah
    ADD CONSTRAINT pk_id_pemakalah PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.pen_luaran_pemakalah DROP CONSTRAINT pk_id_pemakalah;
       public         postgres    false    257            �           2606    16996 /   pen_luaran_buku_ajar pk_id_pen_luaran_buku_ajar 
   CONSTRAINT     m   ALTER TABLE ONLY public.pen_luaran_buku_ajar
    ADD CONSTRAINT pk_id_pen_luaran_buku_ajar PRIMARY KEY (id);
 Y   ALTER TABLE ONLY public.pen_luaran_buku_ajar DROP CONSTRAINT pk_id_pen_luaran_buku_ajar;
       public         postgres    false    245            �           2606    17017    penelitian pk_id_penelitian 
   CONSTRAINT     Y   ALTER TABLE ONLY public.penelitian
    ADD CONSTRAINT pk_id_penelitian PRIMARY KEY (id);
 E   ALTER TABLE ONLY public.penelitian DROP CONSTRAINT pk_id_penelitian;
       public         postgres    false    248            �           2606    16707 1   penelitian_dilitabmas pk_id_penelitian_dilitabmas 
   CONSTRAINT     o   ALTER TABLE ONLY public.penelitian_dilitabmas
    ADD CONSTRAINT pk_id_penelitian_dilitabmas PRIMARY KEY (id);
 [   ALTER TABLE ONLY public.penelitian_dilitabmas DROP CONSTRAINT pk_id_penelitian_dilitabmas;
       public         postgres    false    205            �           2606    16725 9   penelitian_non_dilitabmas pk_id_penelitian_non_dilitabmas 
   CONSTRAINT     w   ALTER TABLE ONLY public.penelitian_non_dilitabmas
    ADD CONSTRAINT pk_id_penelitian_non_dilitabmas PRIMARY KEY (id);
 c   ALTER TABLE ONLY public.penelitian_non_dilitabmas DROP CONSTRAINT pk_id_penelitian_non_dilitabmas;
       public         postgres    false    206            �           2606    17203    peng_luaran_hki pk_id_peng_hki 
   CONSTRAINT     \   ALTER TABLE ONLY public.peng_luaran_hki
    ADD CONSTRAINT pk_id_peng_hki PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.peng_luaran_hki DROP CONSTRAINT pk_id_peng_hki;
       public         postgres    false    267            �           2606    17191     peng_luaran_lain pk_id_peng_lain 
   CONSTRAINT     ^   ALTER TABLE ONLY public.peng_luaran_lain
    ADD CONSTRAINT pk_id_peng_lain PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.peng_luaran_lain DROP CONSTRAINT pk_id_peng_lain;
       public         postgres    false    265            �           2606    17008 1   peng_luaran_buku_ajar pk_id_peng_luaran_buku_ajar 
   CONSTRAINT     o   ALTER TABLE ONLY public.peng_luaran_buku_ajar
    ADD CONSTRAINT pk_id_peng_luaran_buku_ajar PRIMARY KEY (id);
 [   ALTER TABLE ONLY public.peng_luaran_buku_ajar DROP CONSTRAINT pk_id_peng_luaran_buku_ajar;
       public         postgres    false    247            �           2606    17078 +   peng_luaran_jurnal pk_id_peng_luaran_jurnal 
   CONSTRAINT     i   ALTER TABLE ONLY public.peng_luaran_jurnal
    ADD CONSTRAINT pk_id_peng_luaran_jurnal PRIMARY KEY (id);
 U   ALTER TABLE ONLY public.peng_luaran_jurnal DROP CONSTRAINT pk_id_peng_luaran_jurnal;
       public         postgres    false    255            �           2606    17180 *   peng_luaran_pemakalah pk_id_peng_pemakalah 
   CONSTRAINT     h   ALTER TABLE ONLY public.peng_luaran_pemakalah
    ADD CONSTRAINT pk_id_peng_pemakalah PRIMARY KEY (id);
 T   ALTER TABLE ONLY public.peng_luaran_pemakalah DROP CONSTRAINT pk_id_peng_pemakalah;
       public         postgres    false    263            �           2606    17026    pengabdian pk_id_pengabdian 
   CONSTRAINT     Y   ALTER TABLE ONLY public.pengabdian
    ADD CONSTRAINT pk_id_pengabdian PRIMARY KEY (id);
 E   ALTER TABLE ONLY public.pengabdian DROP CONSTRAINT pk_id_pengabdian;
       public         postgres    false    249            �           2606    16946 1   pengabdian_dilitabmas pk_id_pengabdian_dilitabmas 
   CONSTRAINT     o   ALTER TABLE ONLY public.pengabdian_dilitabmas
    ADD CONSTRAINT pk_id_pengabdian_dilitabmas PRIMARY KEY (id);
 [   ALTER TABLE ONLY public.pengabdian_dilitabmas DROP CONSTRAINT pk_id_pengabdian_dilitabmas;
       public         postgres    false    237            �           2606    16957 9   pengabdian_non_dilitabmas pk_id_pengabdian_non_dilitabmas 
   CONSTRAINT     w   ALTER TABLE ONLY public.pengabdian_non_dilitabmas
    ADD CONSTRAINT pk_id_pengabdian_non_dilitabmas PRIMARY KEY (id);
 c   ALTER TABLE ONLY public.pengabdian_non_dilitabmas DROP CONSTRAINT pk_id_pengabdian_non_dilitabmas;
       public         postgres    false    239            �           2606    16911 *   isi_status_pemakalah pk_id_satus_pemakalah 
   CONSTRAINT     h   ALTER TABLE ONLY public.isi_status_pemakalah
    ADD CONSTRAINT pk_id_satus_pemakalah PRIMARY KEY (id);
 T   ALTER TABLE ONLY public.isi_status_pemakalah DROP CONSTRAINT pk_id_satus_pemakalah;
       public         postgres    false    229            �           2606    16880 +   isi_skema_penelitian pk_id_skema_penelitian 
   CONSTRAINT     i   ALTER TABLE ONLY public.isi_skema_penelitian
    ADD CONSTRAINT pk_id_skema_penelitian PRIMARY KEY (id);
 U   ALTER TABLE ONLY public.isi_skema_penelitian DROP CONSTRAINT pk_id_skema_penelitian;
       public         postgres    false    222            �           2606    16974 %   isi_skema_pengabdian pk_id_skema_peng 
   CONSTRAINT     c   ALTER TABLE ONLY public.isi_skema_pengabdian
    ADD CONSTRAINT pk_id_skema_peng PRIMARY KEY (id);
 O   ALTER TABLE ONLY public.isi_skema_pengabdian DROP CONSTRAINT pk_id_skema_peng;
       public         postgres    false    241            �           2606    16927    isi_status_hki pk_id_status_hki 
   CONSTRAINT     ]   ALTER TABLE ONLY public.isi_status_hki
    ADD CONSTRAINT pk_id_status_hki PRIMARY KEY (id);
 I   ALTER TABLE ONLY public.isi_status_hki DROP CONSTRAINT pk_id_status_hki;
       public         postgres    false    233            �           2606    16985    isi_sumberdaya pk_id_sumberdaya 
   CONSTRAINT     ]   ALTER TABLE ONLY public.isi_sumberdaya
    ADD CONSTRAINT pk_id_sumberdaya PRIMARY KEY (id);
 I   ALTER TABLE ONLY public.isi_sumberdaya DROP CONSTRAINT pk_id_sumberdaya;
       public         postgres    false    243            �           2606    16836    isi_tse pk_id_tse 
   CONSTRAINT     O   ALTER TABLE ONLY public.isi_tse
    ADD CONSTRAINT pk_id_tse PRIMARY KEY (id);
 ;   ALTER TABLE ONLY public.isi_tse DROP CONSTRAINT pk_id_tse;
       public         postgres    false    217            ~           2606    16606    userid_fak pk_userfak 
   CONSTRAINT     X   ALTER TABLE ONLY public.userid_fak
    ADD CONSTRAINT pk_userfak PRIMARY KEY (user_id);
 ?   ALTER TABLE ONLY public.userid_fak DROP CONSTRAINT pk_userfak;
       public         postgres    false    196            �           2606    16611    verifikator verifikator_pkey 
   CONSTRAINT     a   ALTER TABLE ONLY public.verifikator
    ADD CONSTRAINT verifikator_pkey PRIMARY KEY (nip_dosen);
 F   ALTER TABLE ONLY public.verifikator DROP CONSTRAINT verifikator_pkey;
       public         postgres    false    197            E   i   x�}M��0{�)X d'����2�/�R�ɲ��6��8���^Ѥ���'ĉ��8"f"+�3�ي�d��-���TZ��_)�+����VzYRs���]�,"7�)      V   �  x�}UKo�0>�_�㮴��<��V���^&���$6r�J��;� ����*����xGq���ҕ>����U��s�b
jP��� 	�W` 
�����
^�w�򟛓�*�MCh^�J��(x�I�H�g^�@��Ա=�8Jz�j,Z�С�{%�������\I���K����V�4�@��J�#z�,�\�C,�]�Xv�s6��8�L�N��F�t�m0�(�ct�J�^���HKr�]������f�pT���J�8��C�f��&��$��^nMU��Z*��h��ހjN�P�F�Į�GU8k�O��U[x<
���`����\r�,�:�uH֟���8�m/ٵ/��6���z���A�Z,��I��ջ�μHfN���)K�!%��97TYb\�f|�t^���M=�<����/���+p+��װ��xؓ�?�����n͐$�޴KW<k���J�+���r���.۶%�'�k�k�҈U��v�NF�lN�6~��⣿W��c�8�d@YxH}4�=�؛8�O�Y0���;�*�U�{�m/M!O���5�+~�i�K*�;+M���۹:����Үc�,����ύ;'���7��s���y����A��L���6��X]K+�����A&s�b��ޣ�m�s�~��e�PZ��(�7l�!~��_��~��J���rG�T�WR�u��M�K�k]�ɾ��tڃݗZ�=f�QE�~�5��e      a   3   x�3���K�N,Q��+I-�K,���K����2��C�s���y1z\\\ Zt@      Z   C   x�3����-H-�,�LS�K,���K����2�tI-N�+)J��,��Č9R�J���@�=... ��_      U   �   x�M�=
�0�g�>AK�/�%��@:fy&���^�v��Q�'���>ye�X���Ox�J�`�4}�eT��R�����z������f�?3�F84x�N� �EľYB���4*;,\���y��Jr^�7ۃ���`��&�;/      e   �   x�U���0�g�)�H��L%` U�b�b���i�$�O�.�����n	%v���j>�▵'G��BO2�In�����u�l�A=y����=��R�6Z��6����=$%65��C����Jַ��K_�I*�c�v|h�w����8ױ�Q֬#�1g��1��SFP      i   �   x�U�=�0����+:�b�oWc���D]�x��ؒ����ub�{/�$��5p+���~�v-�Ii�7�oiNK8�C�a^A��GY�氯�J
{tC2�1Z�IiӘ˚Z�2����u�-dt�7*��2�!�١��*����� O���d>�Uq�5�Cy�C�̈́?CEj      ]   �   x�]�KO�0��ί�\�x�= U-%��ˠ.���Fk�ǿgN�g��������l;$��n���@�	\���;��`����D�#qF���Y��DY�=��Jg���A�	�������y^��T����+I��Yd���A�^�ɳ&#�f@�r
�����ZaTC��mO⊔Zݳs��
{�!a��}ɻ���v���/�匱.����;����Yr&a����Kŀ�L�2�o؁Q�æi>Ws�C      _   p   x�-˱
�@����)�	dϻ�3`��A�FK! 6)��L����0���>�-T�QCt���d|JTEv�dc[�1�*�c!&bz������a�����g;�����N�!Z      X   �   x�-��n�0�g�)�-��w-P A�6@<f9�L�:�
Z���do�w�oE{��޴{�(?�{�P��8_�wXnwvl���l|�-O|A�_=R���t��9I!O���=j��h�����!������KUf��(����v��\Ы�`�$̞7=���`uG�8��uv�D�_z`�Ny�jwd����i�8�Z      Y   k  x�]RMO1=�_ѓф�hP�1"�4�aiܝ�L[p����r��1}әB=�
Ђ���jQz�TF�6X�t��'}2ܨ'�>w���[5s,�'x�l��K��u,V������S/�8
:��elۺKн��+cCd鑠5%�w��ؠo�C*��z�qc���4�����(T‭���Sf�^,!5��W6l�2q��F∞O���Lֹ�	�_�	��	��ZR~����6 K8�t���^>f�0	��������f��3��d#�V�����L�4��/4�5p��73RO���e����֥��C���j��a� ���~Y���~�C6��q��������X      \   �   x���1o�0�g�Wxl��	-mGK��*
���օ������,!�Y~�{��JS�/j90Į��)��G�3$)�\�OG]q��r�{J�nh���\^�6���]H�F��A����'d~ULS6�1��T7&����N���3���������>X>��Y��{�<tv˞�?H�4Ӂjnp����؏�*Z���4^��S��s/h���r������(� �      o   �   x�m�Ko�0���W�=P������Ym�\r��8�A~���w1R�!K��7;��_�WPk�W[�#`�*׫}��-�n�E?E���}ښ�-�ɠ,�,�Y�.������&BOK(7��Z���Ñ@7S�s��d�[���.v_.ua</C�'}��"x��.UWa�L��R�)*�g���_W�Dm�чN?�i���WEh5{	eO�rdb��jqbsC�X�����(S)g��M�$N���      g   &   x�3�I-JIL+I,���2�t/J�+IMqb���� ���      c   ?   x�3�H�M�N�I�Pp�L,N���2���+�,IMQ�W�N���/IU.HM�N-I��qqq �(      q     x�UP�N1<g��G�PJ��X���R�b#N�X�Y��d�$B��xS8p�2{f�,�e�6�ᵹ2f
3\� ��H>1���t$G����0eL`���Uwm����\7fOB���afn͖r�N�+��-e�vg��CKq��4���s,f��C��g�$#�2k��ƒ�V~�m	gֶ�ai��ѱbݼ�7J�C'�1O#��Vf�2�_�B�$�^;ae𠛩s �g#�3�\�j��<N���k��i��?w�      W   �  x��XKo��^3����PzEQ�ȥ��M��1j�f�͈I�Pu�����CR��+���y�y?Q�`JS+wUU�O?L�?�͆��o+[�͑P�Uؼv�ғPM�jc�	��2��6�1rܪ�Z����Hz9��g�Z�J���y�L�O.�YpotY���{f[�T���7O��������A=*#)�i/B�)�pfGZ흅������=	f�(ѧ������󣌟�{ڭ�$|���V<���x��$(�z��H�^$剣��S�:ԥ�0�0/��fmt�"�A|5�0��?� �<GDV��xum�/��� �7R��9F-IF�����v����*�4��$�s�z迱*����}i]����N����?�f�d��^rj���8_��V�lԪ�ixخCJf�$�Z[f3~B���S�eȅ-�^��by+$�P�8J���g^6)���?\5x6�7'�=\2��`��^	��f�/���<�:�N��Lg������۪����L�e��Z���	�,��s]52��@�Pk��ں]on�;ԪԭdF�Nl��h5�>q|����k�z�^�Mnt������x߈�q�ȖևWYK�^��
�����WH!���'���7+�i��h���R�m@D} /�1��8���xh�<�W{�*��f�P[����OEɲ�SP�OSJT\�WH#��lܠ�n���=�KU4�!��r�D�c�18>)o�p���k�{Su�w����昏��jm$5!���Ǣ��B�BI��`�_��SU3�tkw�.	�⠜�L]j�6[A�1K*,��22���+��I���T�%#d����W���ÐM�N���5ؠ$g*M9x��s7Pc~������V��o��U���7�D�ƌ.��l���#!_?+�(��������vI'�����I���/.|D(�(��TU����g#I��W�n�H2 ~e�xy��'=��\���O�)9��<j�{>���bڎ���P�̇Ү鶈�,���F6"�@F́�N�=�'��������3�XQ��_`�����u���ȶ��T}W���,���4�4Y+yPC��)����>	""c�4�Z>{��%�(��REï��p�$3������-�˘X�c[��aw:?�e�N�9�m-��*uKP+SR
�4	�ܣ���&�`(�Z�|ՠ�S)�ܳ �LN�wX�K�*�j��U' z3j-�j��E����[f�6��N	�E��v#`Æ4��0�R��R�hgL��G3�o�����MƤ1������tN�g���3��U��o�iB4w��j�W�f�S/�Z�e����I�D���X�F��񈡮)�;U�\�~�Ȧ��dl�m����ɢJ�߫��ͨ��ѩøUg1Q<�-���F�B����zͮ.��(��{�6�AZ�����P�<��lA,O�
^�ժ��^�3��WjfÄ�R"E���v�.i�J�;��[Z�$Q�r�OT9��D�L�-.`#¾����L���|b5NReL�#2�qs���yb���A��h��y��pO7s{�.Da�rDM:t8!]
�D�m���z�~�M��E7�����܁l#?�D��q�$�	ֶ\��:�Py�7%�))��"&��z;�JA�	��q���.��p��~Ȳ �8�[�y���Xy�78��Z���c��Y�'Z!H��[�UkqF��9ȇ�)��
N���G�W��Gw�vF�gQ���E8V���Z+�U�pyF��� �Ge�.p9_5gj$��?��1�&��)�HZ����a(��mw4D8r!��]�˅<%�7p�k����P��L��~U��w,�/Õ-�	ؗ�G����ᬍ��-M.Y�h�~"����u�-(��\�����>L��݋?<����(;[��_���K)�K�\���{�K��a�%�@/��I�����B�wwV8hAx�o�吨�|����K� ���}C�h�h��GS�U��,i)]�{B�k���p�[<�O(Ũ>��)sܸ@?mq�P�Z)�n�3���w��%;]j�<�&���5¥��,}+��,rN;c%�"D-6=��cBcG"�`���C�oc|k?����1��B�فT	��*!{Tcٓ��I�}���J���m#k��7����p�x{\A�Rl4�F.��"����/�޽�/��      x   *   x�3�,H�K��,�L�SH�2�r������R\1z\\\ �i�      y   ,   x�3�,H�KOLJ�L�SH���,IL�M�2B�ˇJq��qqq �[�      F      x������ � �      s   �  x����n�0���S�P�K���]�v셮5C�-�]�o?��&qV�C	$����,+v�}M��=y��x8]Y�uL��Zi�\1��hi�3��ز,��L�g�y�������3���T��α ܛ��Z��J�p��=ܽ啀ܔhD��Z���~�?�[o;79����-��M6L ��bj����ޠ���q��G�YO�D/?�y�H��4O&5#?���lM-9C7����xZ�0�0;mgh��=�187Q o[;:�KO���C?�g"��9�(���c^���������ki��ҵ4\ō[�����7�NvS���y��J���ؿ�sI"e�X#m\����ۗTJo�g�2�e��o�p9\w���^�*M���ƭx�eY�j w�      �   �  x����n�0���)���&���VU����P��Mb"���w �[�AJ������)(�%��]�Gg]��@�r����:�w��B3
P�ns|Re����W���^h�K�tCч6}nkZ<�;1F��S\�F�&�~�Z/��b��+ԣ6�%e,���JX��=�;��B�yΦ[DWSCb����w�W���Ch���!�7�E��D�q��m�&)'ԩ7�欨�?VJ�R㏟�w7�D<G�`��u�����C{��2� f�Z���z֏���*
{������ ����KLю�1�9��`�I�+���qW0H�б_�(5��e:�Y�>h\��,�#��]�(�+�h�cD����Q���|{Z�w��%�9q+���5Ś4yf��9#��~Z$I��3>�      z   �  x����n�0���S�ԛJ��@P��Rk��жⲶeÒ���'/@��i��h)$��@�C�'B�ۑ5ܙ$�.8�fO����#�>pl�^�frD��1�;�s����&��5��k��i=��	������,Sk�
f���1:g���K����[�!
;�I���TC��j��&��8�Bd��Lh�A��k�s��
�����@����S٣{<�7�&d����/�#R��4S{z���b�Y��ټOq��T�f�o�vD�u��v�f ���]��2ޏ�X����C�4��#����U��ʩ�xU]t�����$����͗�lm�o�[�.�f������>k{J	/���L�>�Tӿ��^ĩ"O�U��IO�p��c@�g�(M���y�����P���7��_.��k;_�      �   
  x���Kn�@���)|"���DU�2d1P��wP�v�dQ����O���m��y��t���x�I�UI�湻��:��idbmȔ�l��:�{�p�O���1<:��<��r��e'���-�<�9<bi.�u�배�EL�'�D��ʽ,B� D63���<A5z��5�D˝-\j�$�l]�ˏh�X�p5Χz oH�9����(��Z�c��?�M��o�nYaY�mWhV�/���9�[��bt9DQ�5P�          n  x�u��j�@�ϣ��o�gd�+	�B&`�&G_ZRG���k��;�n�Ϝ�ꢨ�R�6�'��E;q4
Z�;�@'l��#�0ZT	u��D����֋bW�S0J�j�U��SG�[,�4�_z�|I�?-&t���y�2�[�>�jֱu�_�q�=Z���]5c���&U����c��ˬ0�]K_5S��2y�ҙ�q����a��/��|:3��:QO(��u�g!d��������N�쨆�Ӌ��q li���\yU�#��6dKW}�\���H�W-	�V�N�e�y�W@�_s���	�Bq�p/��d�}�-=�e��u����P3x�3��C���F���ޚ���&��(������      v   9   x�3�,I-.��CAF�f���2���F@��������(����� ��-      K   >  x��U�o�8~v��yܓd �	o�HU�����վL��|!&2p���7i6��m�vω��o�{��j�D���Ј�(����� ֲ�B�l�����Se�A!�S�o�)[l@�Rh	[�P��~p[ow���\C���Vl)��HD�fB�����0|�\��sz��7F)UW5mGj��iI�v��GF�nC�A*�Vl!Ө�]��AI��.ǖ�T����+�QM[�6�4s�=��{�/}w�s�}���r�u�|�'�Y��"����	o0����-�DqpA]G��V*/`n�,��$
� n���y ��!2�e42�i�D�Q~ %�Mi+����Y�aԋ��yB�E�p�&g�f���R�kBm��uc��� ��sp�܇��h.��¤��J�S�yޯ�B��ǔoQ�I��Oz��j�ص���x����pC.�z��+�rB�T#��o��m��9�̞NGT �f�������t�{�؎ͩ���h���׍�0���L��'��	��?�}o�R��|���o�}/�������NlW��NQjVBo��;���:w|����#���w�>��2��><�Ͼ����pB�#DN_�TcXl�z�o,�L�X�.L�E�82��~�b �����lL��}�G�(����{��IJ/�H���m��IT�9�Y%.@<1��9��-�h<#��"{����\T�x#��%M��Hy� :��hC(\���
��M>=����^\g�&j��F�:`z������ԝ�E��?yE��+Ҕ^�HV�u%sq@K��VtO坖���jy�q�=C�����m��$_��`�/	q�      L   �  x��S�n�0=���c+AHҥnަ��$D�j��@��%8Ȏ���wݶ��Z�9ē�f��0d�-QA�*���%���F�x�F
E�׍�ƪ��PH�J��H٠%J�%l�BU�ă{�||��so.ېx����q�#�y<�Q|;��{��Q��"m<{	��q��l�L��gs�>�[D�4����/������h��%�1O�MF1O!���찗�2�D%w���@.4nQ1�QB�:����ǌ%�k�������Ѷ��񐒉�GĆ�	>�{n��鶑$��
���jd� U�Ң��Z����T�+�mD��lJ�RI�;��|�����^Ol+�5������v;oM�>[Tc��Q���qQN��:~�p��7z�XHXoxq5}����8���)a}���� |?d�B?����*�@z���I�݌`�u��%KٍȃCҾı*�!q�RB����h�l�6ޒBM*c��
I_�]n�|f��!7�g1�4N�;sJ}%�Q�q�w����<�i>�3�b�S�����ѿG�"5YN~ݙ�<�3��z%��_��vP%8����;C:�e�kge>�^p������Ŝ�.�~0����`��}�b'�M�k=x�V�7�q��      u   �  x��TMo�0=+���]�@v����@Q�c/t�:�-ʰ�y��c�ːt-r�N��G>(SqK�Fn���ء7���;GU�/eQ�:)T��j�PT����i�tt�#������N��.�:��,��Z%e�Ӆ�O��^�ׁ�Wb*Ĵ�%U�\��8]$���J�	X[�
9�F�w�&�Tc���7@/�b���B䶍��l~�������hDu/�P �ê�-Ӊ,j����-�R���fծ���W\���!���U��u#�'	�\��{W��l�Yl��b�JU�}D\^���-����գ������;�34����^ 	��p0�ra�SX��8o�2�Q�P����$���ql.+�XH
�t�i�?�t�8&r�n�s�u��b���}��:i}zOح�ƷL$�C^%��(���Dϛ�j��u�      �     x����n�0���)�T&�x�M�4UZ����20!C{��V�T��|��Ŷ����d`�4��G̉����J
%ͥ4I�������n3�M������LӴ���Ic�d�~q�;3�ŘǸ��X%�T��K�p3_��q��YbDk*ie��#gH�A»zmE�T���[��(NXC6Q3z�ֵ�J��|��$�q�\� �Q��W��+�I�_#��_R*9�V�k&nȉ��/�Z�
0-�i��f/�)�Z��펳�`�ZSYc7 �/�(�_f�\      }   �  x�͓QO�0���_q?@���ĨD%Fx2�t�,�ёu��oC�.�t�^���t��R�?�x8���m0�����]�(���G�Z��2B���{(�tt�O�e����K��f*I��킲U�W(ln���)��kg@ό3�����W5T�ͲR�5_�t�Tʁՙ.,T�lF�(����p�O��_�<��k]z����)'/!����3ކ����ñ����X�j��3�2C �y/Fޮ��u��n�?�,�"�8��v]�7�݆��A�Y�V��V�U#Y���2�ƙ�O�a�(�z�[l��qB����⓶i�����w9+Q��+F��˪8�@t� _�@R�oI�胬V��\9c��G�����n�����"�2�{��vA9 $�=l�0�o���      �   4  x��R�n�0<;_�?�	I�TU�#�!b�d��ub��[+;�}hF���,A�-�ql����l�@����QlmC���5L�F��sn���}&���>���N�qU�u�9`��K��b�&d]�Xa9�q����t���Jf1_d���QÚ��d����vO�	>m���g��zml:�S]�o\V �*C%�gs�fLk��A���!4YNƦ�����|С��bb ���C� �+;���W6�����f�0�S_�� �C��H��¸�o%�_��&(����TU���ǸY$I���      �   �   x�e��
�0�s�}�տ]7۽�CУ���,n��t��n�$�~�bHh�BPŏ�Gni_a�X���~�b�|�w�c ~N�L�gj�M���N|!���iG��s���Ħp��L	��̖�+MN�9���C��j2���*� M�7;>Ձ�?(��"K5�h�Lr�I�| �D�      w      x������ � �      k   �  x��S]o�0}6��>nRk9$@'ð(��*��\f7�����}��nL�ʖ�!�����s�`DPk����˔���\�7���7�����
����� �e�-��M��x�H�Q�Y���L���me[����!A��\e����@͡���6�8�u²���\Qt�-t��0uc�j�����
]qeH��L��r�6+bv/{FN{FN	_�� ��9��2� g��D�T��^{�r.�sYׇG
�����)��=�@m�<�9�ikM<C�������ckJ�c[�"�+a��G���o�A~Zo�G�6�7I{z�4h��"ܙKP�.;�Bn�#�L`׫�����V%j�}B�Ŀr:�hi���Cw�t?m�����m�	�$�yNz��Y�������`06�L�Uv86�F�4
~�19?�~��#�*��u%���*Ϥ�C�b�A�ἦ�.&j�<M���Y.=峒��=MC�#��j��H�ϥ��x��ɫf��J��O�M�      m   �  x���݊�0��姘�6Bv~�;��&��J�m����EV�Q��ׯoC���`t���g䬎%��Š�R��p$)��\H�|/��|��f�	R���$n;o�R
Xr�*�3v��)�i�*����"ވ��9�G:�������R.�H�>R�U&n^��[ג�n���"��n�.�S�SF5��v�\�xFCĹW5�xА��n������L����@�*�~�A�������Ϸ�tSc��I�l���:����4z?�H�-k/F,�	�y4�GӐ�a8a6w���ڂ[���X@b�)ӷ���N�g�/M��}F06�&���V�x�o���XV��9�t�h,������e�\rH��H9��_�_x]�?�5��M���|�;�Yn3��,�Nz��sA�97�{����]���      B   (  x���?kA�����2E&$$��$`L�����<ivv�X͞���~�4Oқ1K���"栟����7������R+���fb|6���{&
����Ejl ��}��O��=Ybb�*{�!�8�U9�U$=�E�D�Bi_�' % EB-dQ�C"���������j��RQ�}��ɑ�(i�X:$k�p�z?/�Ծ�_�0L���TI�ԡ��T���f��T�_'|[t0��#c!}����Ss�*X�~#�1�L4�G��kv�
��#ed�{�h��5�1���'L�ve?��1��!#���\�Ε<�E�Ǹ;LR���ۋZ0��Y��j)��}_z�8�ѽ�4��θ.��7;{gw��~1�6�c�����>y����������1F#sۏ�ÄnN��RG�0FՕG]Y��`�sC�`"[��S%���3��?��RQ���;b1۽�u��NPK{3�4�T-�+҉^F-��M5�T�2lkF�pJ7�:�0��q]lv�Ěeԕc��X�{�뷱�7󌠪�S38�XL��j{�v������~ڰ�¢�����=�w���-�\w��!z���486�6�$J��\�0A���������qk;T��Z��I�h&'��De����DpA�.=��:��[�T�?E
�����ݢ�^3��xH�]]	0ɸ��מ>�ԉf�r7�ͬ<D�є�'�Y�`J�鉚=��E�W)�"6y��"��ׅ���Z��*u�-i)��.�ێ�Lg.���7��e'6��+�ޛ���}��U�>��������_o������?���      C      x���W��*�@����&x.=�q\H��/]g�*�	B	9��Ɣ���r����PS?%�)��Soh���)z�h�~m�dS5���j	Oz����������ʭ��bH-���z=vj+�m�w���Ŷ��H!�;�s[5���E�`����ɡ��Ā��Q%F�����jS��=��7�6���Fբ�����߱�аG���_�f�o����ı6���*�:S�x�g��y��:T?A[��<�c����-XjY�}5F��
��Nm�p(�ϣg۠�}��â������ik�G)1��l�&
$@�E�]A�X����C0b��wܶS0��ӊM�<v=C��H�:�11h�cS)Vz�k[O�z$�+��]kPm���jk�S��jm���9�m�CL����Rn�wJ9��c��J65��Ĳ��I����",9藚퓂Q��������^���x���x!2N䷯sȠ��b�T ����Mu�q��}� }����	�P��*��8kC������¥�Mt�T��W�\��q
m��M����mP �p;��:��;���Ǌh��+6U�y��=�����C�k0ťh\�ɣ"��N�ڔ-���Z��N[u쎔��2����~��џ�O���w�*�5aP�O5��~rF��1�/iC����A��Eyc�C��.j��P�;��MŷC�����:��ڕ*�_m-r�zy�]�5:^Ғ�ɥ�cU�eP`���ѢF�ao�ڡ`�-}���x��O���<v�C}�!ۨ*>t��57~�JNX�L�g[0^ej��� �*Ɵ�*0�J��ص��1?���2���jQC~�W�0k0���~�(W�H�<U�9�5��B���+�r�zp�ݟ����l��fR���j��B�*sj��hS�_V�ԿN����γ�:O����ߛ��*c�ʍڛw(8a�ojt���hP����M�,}�*cV�&j�9%�$}05�PGOM_V�1�  ��}��,O}�:�X����5δ��ޢ�ewTB�ea�ۂ���
I�'�kt��G�ׇ�HZ���֜��CVf�ن��B�F�c�coPN�4O��P��j�=�WV�!�zƨ����PpT�/���P��&���/�/��Iܩ2�ڀ�0NI
,	�,�=�±/3϶Cẏ�'jR(�Cɡ��Ķ�Y�:�|�:;l*�iQ����4חE��T���ZT������jd?��{ybW�Z��KU�&'���ص�pR��B�׺�k���)�r�:�#6�Cu�I�ޡ�_Π���I{jLj�嫤�E%�c�h+A,$J��Ee^�B5(��贚;͠� �0��m)��j_���ϒ�֗Eń��"?١�2F���(�8�ȟ.gR��i͡�
E�B�������a�ȗ���%�y{�X�J�EaPcH9Rvy��c�"��?G����'&����o��obRc=��P`�e-m
�o��5�I^��kF"��}��0��B�+ZH_�q2����eΥ�5��\ĺ7)�Cr}T�1�r����r��GPW��޿)+=ڢ`ol�פ:����wR����-���f�T�=TI��ĥ�Г��Z���R:m�V�v�#Q��Z�$D�6�Ϡ�@��J�?9�8�`��z"�0�S�+"�)d���B=| \����[�^�l
����b:!��}�(�==�2'�� &��(,i���/\$�z��СP�fO3(���-����q�z�_&��5�ȶ�bs�@a�&jQ��4��X��ID�z�� ��R�=�W4>1W��l#?׶`fbT�f��߉�y�jH���mQ�x���Ht���6�w���\�8�#j�E����~R����*s$��龺�vGS:�IA�Я�ƙ���tr(���Đ �~��ƠF�J��r���������4��`a}"�9�.c�CU����>)e���{����F�y�)��Q�DO���r��P����Gqo���z�B�/�R=�Ο m;�(8ɦ�q�����Y�ˤ������,g�+E�-c�'�����'U�W{}b����JA��3u�bS��W� �Hs���Ǚ�0u�����KvZZ>���
�N�M���
��1�oY�xR�A{�O
I�Ӽ�����-�]A�X�&uL�&�U��5ڧ��ڪӧ0c��ّoT�W�)��w��j�(���-j�6��dS��@�S3d�Dam�t����0������2(�!o�� n���6�H�_��ְz7��Ma����Y�K������Aa���VN.���C��<�R�)�Au��Eq��8�
�c����v�������5�y׮�S��U�Q�j�CU��։E��0��AA���T�e=��X�*���t��(,*q6����g[��϶r)%1�M�m���9�a��T�z?ZTc��z0 	��6��� ~�G�!��������=je����:k�C5n�[���y0"�aPÚ���E�y�2���L1�}�EMy�o�����_�;i�'��Jj�W���4�?F�ᶄ��!��Z����N��"27����u|�����|��C��V7(�9�G/��L���q�ΎF�;N
��fo[T��zMXh$zMT��WD�O
��u�!;����
�[
�v���D#eQXT���=z��(s�{���p�ن�r�O
r�ν�(�l�@N�%�i�S�����hQ8Js=�rV���qR��'26����������,���N�geP���P)�|��c�V�M)�aSp�C��Hrܵ��8�M�;
�����'�ؿ�2�(��ʵjP2��Ey9j�Y԰�RJ���9Q�C{'�"���rR�QY��K5�;�0HU9���c�)�Ɗz���x��X�md�
��u����:�Tco��:7��y�"�Ң@r�[��F�����P=К�ɢ"���ޢ(o�G[�MO�E�읶�F�OIe�ܜ�<5i����KV��U�����Z���e�al���E5�c��+��M�=�B�a�x�W���Ge��	eR�2e�0(����GX*f*�u*�z�*Q߮5(�䊖��.�xG�j�ӦP���(�ZH �"��;�)�ܦ�����z��m��W${�#�u3����H�GW��A��L�;���	�����X�PpZ=:�ܠ��^Y'�C��C��Q5(��\uF�w�o����N�SFg�zb�����@��"��p.ƺ�gQ��Q�'����[)�h�N�M��/���<(��:�cR��ۮTe��dT��@��I5�'��1(8F�l�UP�p�ed1�~�6���r�h�������ȟ��w<(Z��<nr�PT�U�Rg��P �Z�Ir�B�t��A=��j�Af}!I~�G��8��F��	y�ԿS��)��7T-
���dXTe��&'�j�#�z���;ֆ��Փ�[���)�C��I�[#�ړ�/Uza�83ķشm��I��F¦8�rJL���~�J|{�ޯma:T���rM$�����w����V�"���KN�T�%�A}�����#�̓*���ZGD�龙�h���n�Z�h)��m�~�"R^[/��/�)QGϛx���@�k>G�:�R�*m�3����(��Ol�=U9�Jx�
l�y�����N�|<)�=�7�/mU���
���B77�~<)�L���2��}��	�	dU�>,[Ԣ*<�f�B�ث���N���Eu-���]��A�J��Ei��Ppj���4�j�/ώ�Osت^��ɀ�%"��	NV@�8T✇��k�Zz?T��÷�B1�O�|���:F��+����sR5�ź�����&��Au�"�Y��1C3��r�\Q����?)�tRx[A��'�&L��)9Tf�U���9j3b
�?�w��W���=V.)��7���?&$@>P��lk��ә����{���V^Z~_�B�jK�O���\[Fx,���➴E���&6���:�Q�<�U(��G[ey���W��H?%/8�#���HP9�H�S��kAWٱ�;�2�,*R.?k�^[��u��k+SRո�q6��G�I� �	  ��QrRt�;�h�E����46���tڊ��M^����~�eQ��}�Z��h�:a,jsw�Tó6OMԢ:�®2�w
�>����O,�C�u49�Z9�Hd3X�6i6��Ӫ�!k$�Ƹ�v�-�����X�ӽu������}-
4�u�z��|F�K�(�J��6���~��}-�P��^ո�/͡�
����E�L�k�w̬���� Uݯ�u&�!Tc��0��VS���:����x� ɜ�*��n+&Q/9ԗ�ۯm�@����wR��~�p��I2ѝ�j��;����fQ�l����,�Ϣ��)��c�wXJR�`
�����Z)IǤ��m^'�"����׮��`5C�9G�BU��ܩy��L�i��E���Z�ɦЏ��5aQ��Ƽ"�����S����]�G}�K�PT�J	�s�=T��~��b�Me4��֌EA����Җص>�)��?��\���V$�*�T�/V���PY`��NA�)��Vޣ1^�tr�	,���対U��;��ɑMzP�݇�v�Eq-}�

+�(�Т�~��
�l�i+8�BYS�'o7$
��$���#��։�_a���QXoH�W0��y�¬��cQ��Ŕm
�������ʭ�@qN��|����ٷ:�y�`�~��!�������D�-��H���u���lP�O��<�Y�����E�dt����sȷ'B�uL�2(�'��9[Te3-Ӡ��-|��P�1)_�Iu�[�_��V>��ʯu�>��#"�O�����'�������쓗9��l�{-�pU������˿�6&��'v�a�(�I���-�g�6�'U�TX��ĳ�¦�щEE��PQ�j˘T�l�)MjS�����T0)�����*ȫ�y���guR�If��c��Qm�n�
�ʢ
d��z"d�~uW�w��a޴ŭ�]9iV�1(u��\��3�M���D��kXT��	cPh��sRXk@�C�(�5o�c�Y����j'��.j�yT"=Z�c���+{%1�'չր�n�FaU�E���u*�,�o�t_��7���-
�����j�)sTI�]{�=|d���Bր�mP�Z��T��XH����UX~R�+V�{�&E+GU�8����u$���oO�x��t���G� a[�?$��~1��S[��Y<b�X}x���C�g�ϑx�U1V�-��YhjwX��(1(���=nUe�H��f�շj�&��C�bO*r�'\�1V}�Y��y�,L�l�|m�����ꔫ3�`P�ã�՚�v��d=m�6��L�Q|���#
Ѩt&�*��÷���nT�
��'�}�O��Py}�G�I�Xm����4�*��������*��I�w8%YK̠��YXv��{���@��p�$'��(��~Sp��(�O���ɉ���
��?�(�I�AU����w+�hQ�͍;�R���_�N��T�>ɡ��4_�z�le�*+9�J/�;&���j���MŻi�5�6�ɦ>�ݧOXT�Ӫ�����O*;�K�fd����`���xH��'����I=����)AD����}	���-
&V���BT�	*s�ZawԶ��<Q1�6U?o�OU��������S�Cq�	��wR������������t��1�+����Nu1
+&vu�YTOs�Q]�t�^3(����6�Ol�N
����|�q]Z-W��ޢJ8�8iQ,�˵��7��m�+��S5�W��ǃ�|v�[���)�6[Tb�Q�:�;���7T����{��U]�d�/Ŝ�$��hS���U��i�Ê��T�%"�Ҡ�6��^@r(��𨗳R�7�-
{}"8hD%!�-��˕�����_�~9��<�s�������j�w[3�`Z��_F��x&��m{#Q��{��cT��C�o\���^�Pζ
���>�ҍ8y*T�����mP�8�Y�Dm���ۭ_-�m}_��`�����U�؟�mj~�C��>(���*CϠ0V^��QH����%�����Q���:����IE�=�ڷ�CA|h�`���4=�;��P�d��WՅۨ��Sz��EΞ���\�m�L*�u�yT���G��E�r���2#�G���ɦ�?:�F��>�Fb?�m�ų�ĶLH���mP�U�XZ�Y�r�(��E��5���l
,��_�+�
�U�f�����|bf��{{ⴚ�*��SZ_�9��P���T��_�
j�ϻ"�k�e��{{b�gEk�;��#���W=��xA3U����!I�p�:]�J�^�7T
��� ���5���M�U�>e���V�N�I�u�n#�k�����|]��,�Н��z����Y�T�\�J��0$��b$�j�<��v�9�;����7m���~a�EX�r�N��T+�kR+V~��{sJ�X���V"��9hRf���l�S�ا�W'�J��-s�6�ߣb�n�����c�jT!,�Ġ�`I���.�Yy�Lա��_�3�Y�ux�ڝ].�v��)��|�~ULf��Ѡ"K��������� W�ѳ�S�������4ܳ�     