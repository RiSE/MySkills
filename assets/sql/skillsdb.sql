--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.2
-- Dumped by pg_dump version 9.1.2
-- Started on 2012-07-03 08:55:23 BRT

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 176 (class 3079 OID 11907)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2198 (class 0 OID 0)
-- Dependencies: 176
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 168 (class 1259 OID 279352)
-- Dependencies: 2158 2159 5
-- Name: badge; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE badge (
    id_badge integer NOT NULL,
    name character varying(30) NOT NULL,
    created date DEFAULT now() NOT NULL,
    updated date,
    published smallint DEFAULT 1 NOT NULL
);


ALTER TABLE public.badge OWNER TO postgres;

--
-- TOC entry 167 (class 1259 OID 279350)
-- Dependencies: 5 168
-- Name: badge_id_badge_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE badge_id_badge_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.badge_id_badge_seq OWNER TO postgres;

--
-- TOC entry 2199 (class 0 OID 0)
-- Dependencies: 167
-- Name: badge_id_badge_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE badge_id_badge_seq OWNED BY badge.id_badge;


--
-- TOC entry 2200 (class 0 OID 0)
-- Dependencies: 167
-- Name: badge_id_badge_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('badge_id_badge_seq', 1, false);


--
-- TOC entry 171 (class 1259 OID 279370)
-- Dependencies: 5
-- Name: badges_professional; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE badges_professional (
    id_professional integer NOT NULL,
    id_badge integer NOT NULL
);


ALTER TABLE public.badges_professional OWNER TO postgres;

--
-- TOC entry 170 (class 1259 OID 279362)
-- Dependencies: 2161 2162 5
-- Name: professional; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE professional (
    id_professional integer NOT NULL,
    email character varying(255) NOT NULL,
    fbuid bigint,
    state character varying(2),
    created date DEFAULT now() NOT NULL,
    updated date,
    published smallint DEFAULT 1 NOT NULL
);


ALTER TABLE public.professional OWNER TO postgres;

--
-- TOC entry 169 (class 1259 OID 279360)
-- Dependencies: 170 5
-- Name: professional_id_professional_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE professional_id_professional_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.professional_id_professional_seq OWNER TO postgres;

--
-- TOC entry 2201 (class 0 OID 0)
-- Dependencies: 169
-- Name: professional_id_professional_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE professional_id_professional_seq OWNED BY professional.id_professional;


--
-- TOC entry 2202 (class 0 OID 0)
-- Dependencies: 169
-- Name: professional_id_professional_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('professional_id_professional_seq', 5, true);


--
-- TOC entry 162 (class 1259 OID 238392)
-- Dependencies: 5
-- Name: profissional; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE profissional (
    id_profissional integer NOT NULL,
    email character varying(255) NOT NULL,
    codigo character varying(30),
    data_registro date NOT NULL,
    uf character varying(2),
    fbuid bigint,
    ioscode character varying(30),
    zendcode character varying(30)
);


ALTER TABLE public.profissional OWNER TO postgres;

--
-- TOC entry 161 (class 1259 OID 238390)
-- Dependencies: 5 162
-- Name: profissional_id_profissional_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE profissional_id_profissional_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profissional_id_profissional_seq OWNER TO postgres;

--
-- TOC entry 2203 (class 0 OID 0)
-- Dependencies: 161
-- Name: profissional_id_profissional_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE profissional_id_profissional_seq OWNED BY profissional.id_profissional;


--
-- TOC entry 2204 (class 0 OID 0)
-- Dependencies: 161
-- Name: profissional_id_profissional_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('profissional_id_profissional_seq', 13, true);


--
-- TOC entry 173 (class 1259 OID 279387)
-- Dependencies: 2164 2165 5
-- Name: recruiter; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE recruiter (
    id_recruiter integer NOT NULL,
    email character varying(255) NOT NULL,
    fbuid bigint,
    company character varying(100) NOT NULL,
    state character varying(2),
    created date DEFAULT now() NOT NULL,
    updated date,
    published smallint DEFAULT 1 NOT NULL
);


ALTER TABLE public.recruiter OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 279385)
-- Dependencies: 173 5
-- Name: recruiter_id_recruiter_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE recruiter_id_recruiter_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.recruiter_id_recruiter_seq OWNER TO postgres;

--
-- TOC entry 2205 (class 0 OID 0)
-- Dependencies: 172
-- Name: recruiter_id_recruiter_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE recruiter_id_recruiter_seq OWNED BY recruiter.id_recruiter;


--
-- TOC entry 2206 (class 0 OID 0)
-- Dependencies: 172
-- Name: recruiter_id_recruiter_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('recruiter_id_recruiter_seq', 4, true);


--
-- TOC entry 166 (class 1259 OID 254776)
-- Dependencies: 5
-- Name: recrutador; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE recrutador (
    id_recrutador integer NOT NULL,
    email character varying(255) NOT NULL,
    razao character varying(100) NOT NULL,
    uf character varying(2),
    data_registro date NOT NULL,
    fbuid bigint
);


ALTER TABLE public.recrutador OWNER TO postgres;

--
-- TOC entry 165 (class 1259 OID 254774)
-- Dependencies: 5 166
-- Name: recrutador_id_recrutador_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE recrutador_id_recrutador_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.recrutador_id_recrutador_seq OWNER TO postgres;

--
-- TOC entry 2207 (class 0 OID 0)
-- Dependencies: 165
-- Name: recrutador_id_recrutador_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE recrutador_id_recrutador_seq OWNED BY recrutador.id_recrutador;


--
-- TOC entry 2208 (class 0 OID 0)
-- Dependencies: 165
-- Name: recrutador_id_recrutador_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('recrutador_id_recrutador_seq', 5, true);


--
-- TOC entry 175 (class 1259 OID 279397)
-- Dependencies: 5
-- Name: state; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE state (
    id_state integer NOT NULL,
    initials character varying(2) NOT NULL,
    name character varying(50) NOT NULL
);


ALTER TABLE public.state OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 279395)
-- Dependencies: 175 5
-- Name: state_id_state_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE state_id_state_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.state_id_state_seq OWNER TO postgres;

--
-- TOC entry 2209 (class 0 OID 0)
-- Dependencies: 174
-- Name: state_id_state_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE state_id_state_seq OWNED BY state.id_state;


--
-- TOC entry 2210 (class 0 OID 0)
-- Dependencies: 174
-- Name: state_id_state_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('state_id_state_seq', 1, false);


--
-- TOC entry 164 (class 1259 OID 246584)
-- Dependencies: 5
-- Name: uf; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE uf (
    id_uf integer NOT NULL,
    sigla character varying(2) NOT NULL,
    nome character varying(50) NOT NULL
);


ALTER TABLE public.uf OWNER TO postgres;

--
-- TOC entry 163 (class 1259 OID 246582)
-- Dependencies: 164 5
-- Name: uf_id_uf_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE uf_id_uf_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.uf_id_uf_seq OWNER TO postgres;

--
-- TOC entry 2211 (class 0 OID 0)
-- Dependencies: 163
-- Name: uf_id_uf_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE uf_id_uf_seq OWNED BY uf.id_uf;


--
-- TOC entry 2212 (class 0 OID 0)
-- Dependencies: 163
-- Name: uf_id_uf_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('uf_id_uf_seq', 4, true);


--
-- TOC entry 2157 (class 2604 OID 279355)
-- Dependencies: 168 167 168
-- Name: id_badge; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE badge ALTER COLUMN id_badge SET DEFAULT nextval('badge_id_badge_seq'::regclass);


--
-- TOC entry 2160 (class 2604 OID 279365)
-- Dependencies: 170 169 170
-- Name: id_professional; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE professional ALTER COLUMN id_professional SET DEFAULT nextval('professional_id_professional_seq'::regclass);


--
-- TOC entry 2154 (class 2604 OID 238395)
-- Dependencies: 162 161 162
-- Name: id_profissional; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE profissional ALTER COLUMN id_profissional SET DEFAULT nextval('profissional_id_profissional_seq'::regclass);


--
-- TOC entry 2163 (class 2604 OID 279390)
-- Dependencies: 173 172 173
-- Name: id_recruiter; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE recruiter ALTER COLUMN id_recruiter SET DEFAULT nextval('recruiter_id_recruiter_seq'::regclass);


--
-- TOC entry 2156 (class 2604 OID 254779)
-- Dependencies: 165 166 166
-- Name: id_recrutador; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE recrutador ALTER COLUMN id_recrutador SET DEFAULT nextval('recrutador_id_recrutador_seq'::regclass);


--
-- TOC entry 2166 (class 2604 OID 279400)
-- Dependencies: 174 175 175
-- Name: id_state; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE state ALTER COLUMN id_state SET DEFAULT nextval('state_id_state_seq'::regclass);


--
-- TOC entry 2155 (class 2604 OID 246587)
-- Dependencies: 163 164 164
-- Name: id_uf; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE uf ALTER COLUMN id_uf SET DEFAULT nextval('uf_id_uf_seq'::regclass);


--
-- TOC entry 2188 (class 0 OID 279352)
-- Dependencies: 168
-- Data for Name: badge; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY badge (id_badge, name, created, updated, published) FROM stdin;
1	iOS	2012-06-28	\N	1
2	Zend	2012-06-28	\N	1
\.


--
-- TOC entry 2190 (class 0 OID 279370)
-- Dependencies: 171
-- Data for Name: badges_professional; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY badges_professional (id_professional, id_badge) FROM stdin;
1	1
1	2
\.


--
-- TOC entry 2189 (class 0 OID 279362)
-- Dependencies: 170
-- Data for Name: professional; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY professional (id_professional, email, fbuid, state, created, updated, published) FROM stdin;
1	tiagoyg@gmail.com	100000634528702	0	2012-06-29	\N	1
2		100004045772057	0	2012-07-02	\N	1
3		100004045772057	0	2012-07-02	\N	1
4	susan.intel@intel.usa	100004045772057	0	2012-07-02	\N	1
5	teste@t.com	100000634528702	PE	2012-07-02	\N	1
\.


--
-- TOC entry 2185 (class 0 OID 238392)
-- Dependencies: 162
-- Data for Name: profissional; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY profissional (id_profissional, email, codigo, data_registro, uf, fbuid, ioscode, zendcode) FROM stdin;
1	tiago@teste.com	123123123123	2012-06-19	\N	\N	\N	\N
2	anderson@teste.com	123	2012-06-19	\N	\N	\N	\N
3	tiagoyg@gmail.com	123123123	2012-06-19	\N	\N	\N	\N
4	asdad	asd	2012-06-20	\N	\N	\N	\N
5	anderson@silva.teste.com	999	2012-06-20	GO	\N	\N	\N
6	teste@testetiago.com	123	2012-06-21	PE	\N	\N	\N
7	ttt@teste.br	123	2012-06-21	PE	\N	\N	\N
8	ttt@teste.br	123	2012-06-21	PE	\N	\N	\N
9	aaaaahhh@teste.com	123	2012-06-21	sd	\N	\N	\N
10	antares@te.com	555	2012-06-21	OC	\N	\N	\N
11	teste@t-online.com		2012-06-21	AC	\N	\N	\N
12	tiagoyg@teste.com	123	2012-06-22	PE	100000634528702	\N	\N
13	perrelli@perrelli.com	2345678	2012-06-26	PE	100000634528702	\N	\N
\.


--
-- TOC entry 2191 (class 0 OID 279387)
-- Dependencies: 173
-- Data for Name: recruiter; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY recruiter (id_recruiter, email, fbuid, company, state, created, updated, published) FROM stdin;
1		100000634528702	company	0	2012-06-29	\N	1
2		100004045772057	intel	0	2012-07-02	\N	1
3	susan.intel@intel.com.br	100004045772057	intel	0	2012-07-02	\N	1
4	inc@tucson.com	100004045772057	tucson inc	PA	2012-07-02	\N	1
\.


--
-- TOC entry 2187 (class 0 OID 254776)
-- Dependencies: 166
-- Data for Name: recrutador; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY recrutador (id_recrutador, email, razao, uf, data_registro, fbuid) FROM stdin;
1	rise@teste.com	RiSE	PE	2012-06-21	\N
2	teste@t-online.com	company	us	2012-06-21	\N
3	recruta@rh.com	recruta	OC	2012-06-21	\N
4	tiago@naips.com.br	Naips Tecnologia	PE	2012-06-25	100004045772057
5	idealizza@tres.com	idealizza	PE	2012-06-25	100004045772057
\.


--
-- TOC entry 2192 (class 0 OID 279397)
-- Dependencies: 175
-- Data for Name: state; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY state (id_state, initials, name) FROM stdin;
1	AC	Acre
2	AL	Alagoas
3	AM	Amazonas
4	AP	Amapá
5	BA	Bahia
6	CE	Ceará
7	DF	Distrito Federal
8	ES	Espírito Santo
9	GO	Goiás
10	MA	Maranhão
11	MG	Minas Gerais
12	MS	Mato Grosso do Sul
13	MT	Mato Grosso
14	PA	Pará
15	PB	Paraíba
16	PE	Pernambuco
17	PI	Piauí
18	RP	Paraná
19	RJ	Rio de Janeiro
20	RN	Rio Grande do Norte
21	RO	Rondônia
22	RR	Roraima
23	RS	Rio Grande do Sul
24	SC	Santa Catarina
25	SE	Sergipe
26	SP	São Paulo
27	TO	Tocantins
28	OC	Other Country
\.


--
-- TOC entry 2186 (class 0 OID 246584)
-- Dependencies: 164
-- Data for Name: uf; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY uf (id_uf, sigla, nome) FROM stdin;
1	AC	Acre
2	AL	Alagoas
3	AM	Amazonas
4	AP	Amapá
5	BA	Bahia
6	CE	Ceará
7	DF	Distrito Federal
8	ES	Espírito Santo
9	GO	Goiás
10	MA	Maranhão
11	MG	Minas Gerais
12	MS	Mato Grosso do Sul
13	MT	Mato Grosso
14	PA	Pará
15	PB	Paraíba
16	PE	Pernambuco
17	PI	Piauí
18	RP	Paraná
19	RJ	Rio de Janeiro
20	RN	Rio Grande do Norte
21	RO	Rondônia
22	RR	Roraima
23	RS	Rio Grande do Sul
24	SC	Santa Catarina
25	SE	Sergipe
26	SP	São Paulo
27	TO	Tocantins
28	OC	Other Country
\.


--
-- TOC entry 2174 (class 2606 OID 279359)
-- Dependencies: 168 168
-- Name: badge_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY badge
    ADD CONSTRAINT badge_pkey PRIMARY KEY (id_badge);


--
-- TOC entry 2178 (class 2606 OID 279374)
-- Dependencies: 171 171 171
-- Name: badges_professional_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY badges_professional
    ADD CONSTRAINT badges_professional_pkey PRIMARY KEY (id_professional, id_badge);


--
-- TOC entry 2176 (class 2606 OID 279369)
-- Dependencies: 170 170
-- Name: professional_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY professional
    ADD CONSTRAINT professional_pkey PRIMARY KEY (id_professional);


--
-- TOC entry 2168 (class 2606 OID 238397)
-- Dependencies: 162 162
-- Name: profissional_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY profissional
    ADD CONSTRAINT profissional_pkey PRIMARY KEY (id_profissional);


--
-- TOC entry 2180 (class 2606 OID 279394)
-- Dependencies: 173 173
-- Name: recruiter_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY recruiter
    ADD CONSTRAINT recruiter_pkey PRIMARY KEY (id_recruiter);


--
-- TOC entry 2172 (class 2606 OID 254781)
-- Dependencies: 166 166
-- Name: recrutador_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY recrutador
    ADD CONSTRAINT recrutador_pkey PRIMARY KEY (id_recrutador);


--
-- TOC entry 2182 (class 2606 OID 279402)
-- Dependencies: 175 175
-- Name: state_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY state
    ADD CONSTRAINT state_pkey PRIMARY KEY (id_state);


--
-- TOC entry 2170 (class 2606 OID 246589)
-- Dependencies: 164 164
-- Name: uf_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY uf
    ADD CONSTRAINT uf_pkey PRIMARY KEY (id_uf);


--
-- TOC entry 2184 (class 2606 OID 279380)
-- Dependencies: 168 2173 171
-- Name: badges_professional_id_badge_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY badges_professional
    ADD CONSTRAINT badges_professional_id_badge_fkey FOREIGN KEY (id_badge) REFERENCES badge(id_badge);


--
-- TOC entry 2183 (class 2606 OID 279375)
-- Dependencies: 2175 171 170
-- Name: badges_professional_id_professional_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY badges_professional
    ADD CONSTRAINT badges_professional_id_professional_fkey FOREIGN KEY (id_professional) REFERENCES professional(id_professional);


--
-- TOC entry 2197 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2012-07-03 08:55:24 BRT

--
-- PostgreSQL database dump complete
--

