--
-- PostgreSQL database dump
--

-- Dumped from database version 14.5
-- Dumped by pg_dump version 14.5

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: categories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categories (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.categories OWNER TO postgres;

--
-- Name: categories_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categories_id_seq OWNER TO postgres;

--
-- Name: categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;


--
-- Name: companies; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.companies (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    phone character varying(255) NOT NULL,
    email character varying(255),
    address character varying(255) NOT NULL,
    city character varying(255) NOT NULL,
    country character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.companies OWNER TO postgres;

--
-- Name: companies_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.companies_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.companies_id_seq OWNER TO postgres;

--
-- Name: companies_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.companies_id_seq OWNED BY public.companies.id;


--
-- Name: entries; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.entries (
    id bigint NOT NULL,
    product_id integer NOT NULL,
    units character varying(255) NOT NULL,
    parts character varying(255) NOT NULL,
    unit_price numeric(8,2) NOT NULL,
    selling_price numeric(8,2) DEFAULT '0'::numeric NOT NULL,
    opening_stock integer NOT NULL,
    closing_stock integer NOT NULL,
    purchases integer NOT NULL,
    purchases_cost numeric(8,2) NOT NULL,
    closing_stock_cost numeric(8,2) NOT NULL,
    usage integer NOT NULL,
    usage_cost numeric(8,2) NOT NULL,
    system_usage integer NOT NULL,
    stock_shortage integer NOT NULL,
    stock_shortage_cost numeric(8,2) NOT NULL,
    user_id integer NOT NULL,
    company_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.entries OWNER TO postgres;

--
-- Name: entries_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.entries_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.entries_id_seq OWNER TO postgres;

--
-- Name: entries_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.entries_id_seq OWNED BY public.entries.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: ingredient_products; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ingredient_products (
    id bigint NOT NULL,
    ingredient_id bigint NOT NULL,
    product_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.ingredient_products OWNER TO postgres;

--
-- Name: ingredient_products_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ingredient_products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ingredient_products_id_seq OWNER TO postgres;

--
-- Name: ingredient_products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ingredient_products_id_seq OWNED BY public.ingredient_products.id;


--
-- Name: ingredients; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ingredients (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    input_unit character varying(255) NOT NULL,
    processing_unit character varying(255) NOT NULL,
    quantity integer NOT NULL,
    buying_price numeric(8,2) DEFAULT '0'::numeric NOT NULL,
    store_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.ingredients OWNER TO postgres;

--
-- Name: ingredients_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ingredients_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ingredients_id_seq OWNER TO postgres;

--
-- Name: ingredients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ingredients_id_seq OWNED BY public.ingredients.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: optional_inputs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.optional_inputs (
    id bigint NOT NULL,
    company_id integer NOT NULL,
    name character varying(255) NOT NULL,
    number boolean DEFAULT false NOT NULL,
    text boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.optional_inputs OWNER TO postgres;

--
-- Name: optional_inputs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.optional_inputs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.optional_inputs_id_seq OWNER TO postgres;

--
-- Name: optional_inputs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.optional_inputs_id_seq OWNED BY public.optional_inputs.id;


--
-- Name: parts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.parts (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.parts OWNER TO postgres;

--
-- Name: parts_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.parts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.parts_id_seq OWNER TO postgres;

--
-- Name: parts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.parts_id_seq OWNED BY public.parts.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO postgres;

--
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO postgres;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personal_access_tokens_id_seq OWNER TO postgres;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- Name: products; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.products (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    description text,
    category_id integer NOT NULL,
    company_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.products OWNER TO postgres;

--
-- Name: products_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.products_id_seq OWNER TO postgres;

--
-- Name: products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;


--
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_id_seq OWNER TO postgres;

--
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;


--
-- Name: stores; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.stores (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    description text,
    company_id text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.stores OWNER TO postgres;

--
-- Name: stores_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.stores_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.stores_id_seq OWNER TO postgres;

--
-- Name: stores_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.stores_id_seq OWNED BY public.stores.id;


--
-- Name: units; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.units (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    symbol character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.units OWNER TO postgres;

--
-- Name: units_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.units_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.units_id_seq OWNER TO postgres;

--
-- Name: units_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.units_id_seq OWNED BY public.units.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    phone character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    country character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    role_id integer DEFAULT 2 NOT NULL,
    company_id integer DEFAULT 2 NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: categories id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);


--
-- Name: companies id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.companies ALTER COLUMN id SET DEFAULT nextval('public.companies_id_seq'::regclass);


--
-- Name: entries id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.entries ALTER COLUMN id SET DEFAULT nextval('public.entries_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: ingredient_products id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ingredient_products ALTER COLUMN id SET DEFAULT nextval('public.ingredient_products_id_seq'::regclass);


--
-- Name: ingredients id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ingredients ALTER COLUMN id SET DEFAULT nextval('public.ingredients_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: optional_inputs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.optional_inputs ALTER COLUMN id SET DEFAULT nextval('public.optional_inputs_id_seq'::regclass);


--
-- Name: parts id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parts ALTER COLUMN id SET DEFAULT nextval('public.parts_id_seq'::regclass);


--
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- Name: products id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);


--
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- Name: stores id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.stores ALTER COLUMN id SET DEFAULT nextval('public.stores_id_seq'::regclass);


--
-- Name: units id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.units ALTER COLUMN id SET DEFAULT nextval('public.units_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categories (id, title, slug, description, created_at, updated_at) FROM stdin;
1	Snacks	snacks-0639eb60-c493-4f9b-9ae1-d726bd3879d9	Snacks	2022-09-02 10:51:55	2022-09-02 10:51:55
2	Dry Goods	dry-goods-00aa134e-6c97-4538-8a48-e29a7160445d	Dry Goods	2022-09-02 12:00:39	2022-09-02 12:00:39
3	Meat	meat-334ea3b8-dbd3-4316-89a1-4913e50bfcd4	Meat	2022-09-02 14:17:08	2022-09-02 14:17:08
4	Vegetables	vegetables-9521dd75-086b-471f-84f4-db07e1511955	Vegetables	2022-09-02 14:17:39	2022-09-02 14:17:39
\.


--
-- Data for Name: companies; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.companies (id, name, slug, phone, email, address, city, country, created_at, updated_at) FROM stdin;
1	Nakumatt	nakumatt-44rrte66346374	+254712345671	hustlers@email.com	CBD	Nairobi	Kenya	2022-09-02 10:47:49	2022-09-02 10:47:49
2	Uchumi	uchumi-u4tddkvmfkgf	+254712345672	hustlers@email.com	CBD	Nairobi	Kenya	2022-09-02 10:47:49	2022-09-02 10:47:49
3	Tuskeys	tuskeys-rtwuworgh8574	+254712345673	hustlers@email.com	CBD	Nairobi	Kenya	2022-09-02 10:47:49	2022-09-02 10:47:49
4	Raya Hotel	raya-hotel-3f53ebed-77c4-4162-aa47-d26449bcd46f	+254714581597	email@raya.com	River Road	Nairobi	Kenya	2022-09-02 14:01:35	2022-09-02 14:01:35
\.


--
-- Data for Name: entries; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.entries (id, product_id, units, parts, unit_price, selling_price, opening_stock, closing_stock, purchases, purchases_cost, closing_stock_cost, usage, usage_cost, system_usage, stock_shortage, stock_shortage_cost, user_id, company_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: ingredient_products; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ingredient_products (id, ingredient_id, product_id, created_at, updated_at) FROM stdin;
6	5	3	2022-09-02 14:11:00	2022-09-02 14:11:00
7	6	3	2022-09-02 14:11:00	2022-09-02 14:11:00
8	60	3	2022-09-02 14:11:00	2022-09-02 14:11:00
9	3	3	2022-09-02 14:11:00	2022-09-02 14:11:00
10	10	3	2022-09-02 14:11:00	2022-09-02 14:11:00
11	13	4	2022-09-02 14:19:28	2022-09-02 14:19:28
12	64	5	2022-09-02 14:20:19	2022-09-02 14:20:19
13	11	6	2022-09-02 14:20:43	2022-09-02 14:20:43
14	62	7	2022-09-02 14:21:26	2022-09-02 14:21:26
15	12	8	2022-09-02 14:22:07	2022-09-02 14:22:07
16	68	9	2022-09-02 14:26:42	2022-09-02 14:26:42
17	65	10	2022-09-02 14:27:57	2022-09-02 14:27:57
18	9	11	2022-09-02 14:28:54	2022-09-02 14:28:54
20	60	13	2022-09-02 14:31:00	2022-09-02 14:31:00
21	10	13	2022-09-02 14:31:00	2022-09-02 14:31:00
22	63	14	2022-09-02 14:31:35	2022-09-02 14:31:35
23	10	15	2022-09-02 14:32:35	2022-09-02 14:32:35
24	2	16	2022-09-02 14:34:02	2022-09-02 14:34:02
25	54	17	2022-09-02 14:34:37	2022-09-02 14:34:37
26	3	18	2022-09-02 14:35:10	2022-09-02 14:35:10
27	4	19	2022-09-02 14:35:41	2022-09-02 14:35:41
28	8	20	2022-09-02 14:36:19	2022-09-02 14:36:19
29	14	21	2022-09-02 14:36:44	2022-09-02 14:36:44
30	21	22	2022-09-02 14:37:38	2022-09-02 14:37:38
31	15	23	2022-09-02 14:38:12	2022-09-02 14:38:12
32	5	24	2022-09-02 14:38:43	2022-09-02 14:38:43
33	38	25	2022-09-02 14:39:22	2022-09-02 14:39:22
34	19	26	2022-09-02 14:40:05	2022-09-02 14:40:05
35	67	27	2022-09-02 14:41:22	2022-09-02 14:41:22
36	39	28	2022-09-02 14:42:28	2022-09-02 14:42:28
37	43	29	2022-09-02 14:42:52	2022-09-02 14:42:52
38	44	30	2022-09-02 14:43:28	2022-09-02 14:43:28
39	69	31	2022-09-02 14:45:50	2022-09-02 14:45:50
40	56	32	2022-09-02 14:54:15	2022-09-02 14:54:15
41	48	33	2022-09-02 14:55:32	2022-09-02 14:55:32
42	57	34	2022-09-02 14:56:42	2022-09-02 14:56:42
43	73	35	2022-09-02 14:59:42	2022-09-02 14:59:42
44	72	36	2022-09-02 15:00:20	2022-09-02 15:00:20
45	41	37	2022-09-02 15:01:27	2022-09-02 15:01:27
46	46	38	2022-09-02 15:01:47	2022-09-02 15:01:47
47	53	39	2022-09-02 15:02:42	2022-09-02 15:02:42
48	25	40	2022-09-02 15:03:29	2022-09-02 15:03:29
49	26	41	2022-09-02 15:04:10	2022-09-02 15:04:10
50	51	42	2022-09-02 15:04:54	2022-09-02 15:04:54
51	52	43	2022-09-02 15:05:22	2022-09-02 15:05:22
52	55	44	2022-09-02 15:05:53	2022-09-02 15:05:53
53	60	45	2022-09-02 15:06:17	2022-09-02 15:06:17
54	45	46	2022-09-02 15:06:37	2022-09-02 15:06:37
55	40	47	2022-09-02 15:07:03	2022-09-02 15:07:03
56	71	48	2022-09-02 15:07:28	2022-09-02 15:07:28
\.


--
-- Data for Name: ingredients; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ingredients (id, name, input_unit, processing_unit, quantity, buying_price, store_id, created_at, updated_at) FROM stdin;
2	Rice	Kilogram	Portions	24	130.00	1	2022-09-02 12:02:52	2022-09-02 12:02:52
68	Chicken kienyeji	Pieces	Pieces	3	0.00	1	2022-09-02 14:25:31	2022-09-02 14:25:31
69	Spinach	Bunches	Bunches	0	35.00	1	2022-09-02 14:45:14	2022-09-02 14:45:14
3	Unga Chapati	Kilogram	Portions	20	100.00	1	2022-09-02 12:05:21	2022-09-02 12:09:14
4	Unga Mandazi	Kilogram	Portions	8	109.00	1	2022-09-02 12:11:02	2022-09-02 12:11:02
5	Cooking Oil	Litres	Liters	19	250.00	1	2022-09-02 12:12:57	2022-09-02 12:13:10
6	Salt	Kilogram	Kilograms	7	37.00	1	2022-09-02 12:15:26	2022-09-02 12:15:26
7	Sugar	Kilogram	Kilograms	9	135.00	1	2022-09-02 12:15:50	2022-09-02 12:15:50
8	Eggs	Tray	Tray	2	420.00	1	2022-09-02 12:18:27	2022-09-02 12:18:27
9	Sausage	Packets	Packets	1	650.00	1	2022-09-02 12:19:56	2022-09-02 12:19:56
10	Minced Meat	Kilogram	Kilograms	0	0.00	1	2022-09-02 12:20:39	2022-09-02 12:20:39
11	Beef	Kilogram	Kilograms	5	380.00	1	2022-09-02 12:22:04	2022-09-02 12:22:04
12	Chicken Broiler (Copuon)	Pieces	Pieces	3	470.00	1	2022-09-02 12:24:54	2022-09-02 12:24:54
14	Tea Leaves	Kilogram	Kilograms	4	150.00	1	2022-09-02 12:29:33	2022-09-02 12:29:33
15	Tomato Paste	Tin	Tin	3	190.00	1	2022-09-02 12:31:14	2022-09-02 12:31:14
16	Coffee Satchets	Pieces	Pieces	175	5.00	1	2022-09-02 12:33:18	2022-09-02 12:33:49
17	Honey	Pieces	Pieces	54	25.00	1	2022-09-02 12:34:31	2022-09-02 12:34:31
18	Conflakes	Pieces	Pieces	1	275.00	1	2022-09-02 12:35:51	2022-09-02 12:35:51
19	Spaghetti	Pieces	Pieces	1	85.00	1	2022-09-02 12:37:27	2022-09-02 12:37:27
20	Toothpicks	Pieces	Pieces	8	17.00	1	2022-09-02 12:38:47	2022-09-02 12:38:47
21	Blueband	Kilogram	Grams	10	0.00	1	2022-09-02 12:41:01	2022-09-02 12:41:01
22	Serviette	Pieces	Pieces	17	0.00	1	2022-09-02 12:43:40	2022-09-02 12:43:40
23	Take Away Plates	Pieces	Pieces	0	0.00	1	2022-09-02 12:44:48	2022-09-02 12:44:48
24	Milo	Pieces	Pieces	0	0.00	1	2022-09-02 12:45:31	2022-09-02 12:45:31
25	Potatoes (Chips)	Kilogram	Kilograms	0	0.00	1	2022-09-02 12:46:12	2022-09-02 12:46:12
26	Potatoes (Others)	Kilogram	Kilograms	0	0.00	1	2022-09-02 12:46:50	2022-09-02 12:46:50
27	Take Away Cups	Pieces	Pieces	25	15.00	1	2022-09-02 12:48:01	2022-09-02 12:48:01
28	Soy sauce	Pieces	Pieces	3	270.00	1	2022-09-02 12:49:49	2022-09-02 12:49:49
29	Chicken Masala	Pieces	Pieces	0	150.00	1	2022-09-02 12:50:43	2022-09-02 12:50:43
30	Fish Masala	Pieces	Pieces	0	150.00	1	2022-09-02 12:51:27	2022-09-02 12:51:27
31	Paprica	Pieces	Pieces	0	150.00	1	2022-09-02 12:52:43	2022-09-02 12:52:43
32	Khaki Bags Medium	Pieces	Pieces	2	2.50	1	2022-09-02 12:56:57	2022-09-02 12:56:57
33	Khaki Bags Small	Pieces	Pieces	0	2.50	1	2022-09-02 12:57:38	2022-09-02 12:57:38
34	Unga Chapati Brown	Kilogram	Kilograms	8	98.00	1	2022-09-02 12:58:59	2022-09-02 12:59:36
35	Thermoral Big	Pieces	Pieces	1	150.00	1	2022-09-02 13:00:23	2022-09-02 13:00:23
36	Thermoral Small	Pieces	Pieces	1	50.00	1	2022-09-02 13:00:52	2022-09-02 13:00:52
37	Bread	Pieces	Pieces	0	90.00	1	2022-09-02 13:01:28	2022-09-02 13:01:28
38	Milk	Litres	Liters	0	75.00	1	2022-09-02 13:02:22	2022-09-02 13:02:22
39	Tomatoes	Pieces	Pieces	20	10.00	1	2022-09-02 13:04:25	2022-09-02 13:04:25
40	Orange	Pieces	Pieces	26	5.00	1	2022-09-02 13:05:41	2022-09-02 13:05:41
41	Gorget	Pieces	Pieces	10	20.00	1	2022-09-02 13:06:48	2022-09-02 13:06:48
42	Hoho	Pieces	Pieces	22	10.00	1	2022-09-02 13:07:33	2022-09-02 13:07:33
43	Onions	Pieces	Pieces	10	58.00	1	2022-09-02 13:08:46	2022-09-02 13:08:46
44	Carrots	Pieces	Pieces	45	12.00	1	2022-09-02 13:10:11	2022-09-02 13:10:11
45	Lemon	Pieces	Pieces	25	4.00	1	2022-09-02 13:11:25	2022-09-02 13:11:25
46	Garlic	Pieces	Pieces	2	20.00	1	2022-09-02 13:12:21	2022-09-02 13:12:21
47	Yellow pepper	Pieces	Pieces	1	50.00	1	2022-09-02 13:13:22	2022-09-02 13:13:22
48	Red pepper	Pieces	Pieces	1	50.00	1	2022-09-02 13:14:31	2022-09-02 13:14:31
49	Njahe	Kilogram	Kilograms	0	180.00	1	2022-09-02 13:16:01	2022-09-02 13:16:01
50	Ndengu	Kilogram	Kilograms	1	180.00	1	2022-09-02 13:20:47	2022-09-02 13:20:47
53	Ginger	Kilogram	Pieces	1	100.00	1	2022-09-02 13:27:13	2022-09-02 13:27:13
52	Ngwaci	Kilogram	Pieces	1	90.00	1	2022-09-02 13:25:53	2022-09-02 13:27:59
51	Nduma	Kilogram	Pieces	1	120.00	1	2022-09-02 13:24:01	2022-09-02 13:28:36
54	Unga Ugali	Kilogram	Portions	14	98.00	1	2022-09-02 13:34:01	2022-09-02 13:34:01
55	Dhania	Bunches	Bunches	20	3.00	1	2022-09-02 13:39:23	2022-09-02 13:39:23
56	Lettuces	Pieces	Pieces	1	50.00	1	2022-09-02 13:46:27	2022-09-02 13:46:27
57	Cacumber	Pieces	Pieces	1	20.00	1	2022-09-02 13:47:27	2022-09-02 13:47:27
58	Pilipili	Pieces	Pieces	4	10.00	1	2022-09-02 13:48:37	2022-09-02 13:48:37
70	Skuma wiki	Bunches	Bunches	0	35.00	1	2022-09-02 14:47:00	2022-09-02 14:47:00
61	Matoke	Bunches	Pieces	1	100.00	1	2022-09-02 13:58:20	2022-09-02 13:58:20
62	Goat Meat	Kilogram	Kilograms	2	500.00	1	2022-09-02 13:59:41	2022-09-02 13:59:41
63	Liver	Kilogram	Kilograms	0	0.00	1	2022-09-02 14:00:28	2022-09-02 14:00:28
64	Fish Fillet	Pieces	Pieces	0	0.00	1	2022-09-02 14:01:25	2022-09-02 14:01:25
65	Matumbo	Kilogram	Kilograms	0	180.00	1	2022-09-02 14:01:55	2022-09-02 14:01:55
66	Vinegar	Litres	Liters	0	0.00	1	2022-09-02 14:03:26	2022-09-02 14:03:26
67	porride flour	Kilogram	Kilograms	0	0.00	1	2022-09-02 14:04:30	2022-09-02 14:04:30
60	Leeks	Bunches	Bunches	1	120.00	1	2022-09-02 13:52:01	2022-09-02 14:48:37
71	Water melon	Kilogram	Kilograms	0	40.00	1	2022-09-02 14:51:00	2022-09-02 14:51:00
72	Cabbage	Pieces	Pieces	4	0.00	1	2022-09-02 14:52:19	2022-09-02 14:52:19
73	Peas	Kilogram	Kilograms	0	0.00	1	2022-09-02 14:59:08	2022-09-02 14:59:08
13	Fish Tilapia	Pieces	Pieces	20	205.00	1	2022-09-02 12:25:41	2022-09-02 15:20:24
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_resets_table	1
3	2019_08_19_000000_create_failed_jobs_table	1
4	2019_12_14_000001_create_personal_access_tokens_table	1
5	2022_08_01_134140_create_categories_table	1
6	2022_08_03_193309_create_units_table	1
7	2022_08_03_193842_create_products_table	1
8	2022_08_03_225615_create_roles_table	1
9	2022_08_03_225912_create_companies_table	1
10	2022_08_04_133040_create_parts_table	1
11	2022_08_04_155129_create_entries_table	1
12	2022_08_19_122549_create_stores_table	1
13	2022_08_21_214126_create_optional_inputs_table	1
14	2022_08_31_123144_create_ingredients_table	1
15	2022_08_31_132520_create_ingredient_products_table	1
\.


--
-- Data for Name: optional_inputs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.optional_inputs (id, company_id, name, number, text, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: parts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.parts (id, name, created_at, updated_at) FROM stdin;
1	Portions	2022-09-02 10:47:49	2022-09-02 10:47:49
2	Cups	2022-09-02 10:47:49	2022-09-02 10:47:49
3	Liters	2022-09-02 12:11:50	2022-09-02 12:11:50
4	Kilograms	2022-09-02 12:14:34	2022-09-02 12:14:34
5	Tray	2022-09-02 12:16:34	2022-09-02 12:16:34
6	Packets	2022-09-02 12:19:14	2022-09-02 12:19:14
7	Pieces	2022-09-02 12:24:23	2022-09-02 12:24:23
8	Tin	2022-09-02 12:30:39	2022-09-02 12:30:39
9	Grams	2022-09-02 12:32:18	2022-09-02 12:32:18
10	Bunches	2022-09-02 13:37:00	2022-09-02 13:37:00
\.


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
4	App\\Models\\User	1	token	3bad6329220d386473bccbb28e51f9f700f3bccb37913389af5e8036e07d6247	["*"]	2022-09-03 11:50:15	\N	2022-09-03 11:49:07	2022-09-03 11:50:15
5	App\\Models\\User	1	token	6274a6c81617fe98a383a89e6dad683465db43ea41e5702546b265f0ead39f90	["*"]	2022-09-03 14:23:27	\N	2022-09-03 14:22:45	2022-09-03 14:23:27
\.


--
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.products (id, name, description, category_id, company_id, created_at, updated_at) FROM stdin;
1	Ndazi	Ndazi	1	1	2022-09-02 10:52:24	2022-09-02 10:52:24
3	Samosa	\N	1	1	2022-09-02 14:11:00	2022-09-02 14:11:00
4	Whole fish	\N	3	1	2022-09-02 14:19:28	2022-09-02 14:19:28
5	Fish fillet	\N	3	1	2022-09-02 14:20:19	2022-09-02 14:20:19
6	Beef	\N	3	1	2022-09-02 14:20:43	2022-09-02 14:20:43
7	Goat meat	\N	3	1	2022-09-02 14:21:26	2022-09-02 14:21:26
8	COUPON	\N	3	1	2022-09-02 14:22:07	2022-09-02 14:22:07
9	Chicken kienyeji	\N	3	1	2022-09-02 14:26:42	2022-09-02 14:26:42
10	Matumbo	\N	3	1	2022-09-02 14:27:57	2022-09-02 14:27:57
11	Sausages	\N	3	1	2022-09-02 14:28:54	2022-09-02 14:28:54
13	Samosa	\N	3	1	2022-09-02 14:31:00	2022-09-02 14:31:00
14	Liver	\N	3	1	2022-09-02 14:31:35	2022-09-02 14:31:35
15	Minced meat	\N	3	1	2022-09-02 14:32:35	2022-09-02 14:32:35
16	Pishori Rice	\N	2	1	2022-09-02 14:34:02	2022-09-02 14:34:02
17	Ugali	\N	2	1	2022-09-02 14:34:37	2022-09-02 14:34:37
18	Chapati	\N	2	1	2022-09-02 14:35:10	2022-09-02 14:35:10
19	Mandazi	\N	2	1	2022-09-02 14:35:41	2022-09-02 14:35:41
20	Eggs	\N	2	1	2022-09-02 14:36:19	2022-09-02 14:36:19
21	Tea leaves	\N	2	1	2022-09-02 14:36:44	2022-09-02 14:36:44
22	Croma	\N	2	1	2022-09-02 14:37:38	2022-09-02 14:37:38
23	Tomato paste	\N	2	1	2022-09-02 14:38:12	2022-09-02 14:38:12
24	Salad oil	\N	2	1	2022-09-02 14:38:43	2022-09-02 14:38:43
25	Milk	\N	2	1	2022-09-02 14:39:22	2022-09-02 14:39:22
26	Spagheti	\N	2	1	2022-09-02 14:40:05	2022-09-02 14:40:05
27	Porriage	\N	2	1	2022-09-02 14:41:22	2022-09-02 14:41:22
28	Tomatoes	\N	4	1	2022-09-02 14:42:28	2022-09-02 14:42:28
29	Onions	\N	4	1	2022-09-02 14:42:52	2022-09-02 14:42:52
30	Carrots	\N	4	1	2022-09-02 14:43:28	2022-09-02 14:43:28
31	Spinach	\N	4	1	2022-09-02 14:45:50	2022-09-02 14:45:50
32	Lettuces	\N	4	1	2022-09-02 14:54:15	2022-09-02 14:54:15
33	Red pepper	\N	4	1	2022-09-02 14:55:32	2022-09-02 14:55:32
34	Cucumber	\N	4	1	2022-09-02 14:56:42	2022-09-02 14:56:42
35	Garden peas	\N	4	1	2022-09-02 14:59:42	2022-09-02 14:59:42
36	Cabbages	\N	4	1	2022-09-02 15:00:20	2022-09-02 15:00:20
37	Babby marrow	\N	4	1	2022-09-02 15:01:27	2022-09-02 15:01:27
38	Garlic	\N	4	1	2022-09-02 15:01:47	2022-09-02 15:01:47
39	Ginger	\N	4	1	2022-09-02 15:02:42	2022-09-02 15:02:42
40	Potatoes (chips)	\N	4	1	2022-09-02 15:03:29	2022-09-02 15:03:29
41	Potatoes (others)	\N	4	1	2022-09-02 15:04:10	2022-09-02 15:04:10
42	Arrow roots	\N	4	1	2022-09-02 15:04:54	2022-09-02 15:04:54
43	Sweat potatoes	\N	4	1	2022-09-02 15:05:22	2022-09-02 15:05:22
44	Dhania	\N	4	1	2022-09-02 15:05:53	2022-09-02 15:05:53
45	Leeks	\N	4	1	2022-09-02 15:06:17	2022-09-02 15:06:17
46	Lemon	\N	4	1	2022-09-02 15:06:37	2022-09-02 15:06:37
47	Oranges	\N	4	1	2022-09-02 15:07:03	2022-09-02 15:07:03
48	Water melon	\N	4	1	2022-09-02 15:07:28	2022-09-02 15:07:28
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.roles (id, name, created_at, updated_at) FROM stdin;
1	Administrator	2022-09-02 10:47:49	2022-09-02 10:47:49
2	Customer	2022-09-02 10:47:49	2022-09-02 10:47:49
\.


--
-- Data for Name: stores; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.stores (id, name, description, company_id, created_at, updated_at) FROM stdin;
1	Store One	Autem nostrum animi non cupiditate voluptas alias.	2	2022-09-02 10:47:49	2022-09-02 10:47:49
2	Store Two	Sit aut nostrum quia.	3	2022-09-02 10:47:49	2022-09-02 10:47:49
3	Store Three	Incidunt ut eaque exercitationem laborum molestiae ducimus.	3	2022-09-02 10:47:49	2022-09-02 10:47:49
\.


--
-- Data for Name: units; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.units (id, title, symbol, created_at, updated_at) FROM stdin;
1	Kilogram	Kg	2022-09-02 10:47:49	2022-09-02 10:47:49
2	Litres	Lt	2022-09-02 10:47:49	2022-09-02 10:47:49
3	Packets	Pkts	2022-09-02 10:47:49	2022-09-02 10:47:49
4	Tray	Tr	2022-09-02 12:16:13	2022-09-02 12:16:13
5	Pieces	Psc	2022-09-02 12:23:27	2022-09-02 12:23:27
6	Tin	Tn	2022-09-02 12:30:30	2022-09-02 12:30:30
7	Grams	Gr	2022-09-02 12:32:10	2022-09-02 12:32:10
8	Bunches	Bu	2022-09-02 13:36:39	2022-09-02 13:36:39
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, phone, email, country, email_verified_at, password, role_id, company_id, remember_token, created_at, updated_at) FROM stdin;
1	Admin	+254714581597	admin@email.com	Kenya	\N	$2y$10$8pEartR0QQFv11lOzJubIuV9yudHLND4SlqM/0FhRNhqv6BZW/ubu	1	1	\N	2022-09-02 10:47:49	2022-09-02 10:47:49
2	Vikita	+254724581596	vikita@email.com	Uganda	\N	$2y$10$xVhzKHW0U30/105E6tllZ.QpYXp471BJbSvjWCiTPwMG/KNexd2fa	2	2	\N	2022-09-02 10:47:49	2022-09-02 10:47:49
3	Otiz	+254724581586	otiz@email.com	Tanzania	\N	$2y$10$o3SSfwvYIVAUBoBU1tZ4HuROYlVAu1BGUa9mhPP./KSMJuoT8Hx9m	2	3	\N	2022-09-02 10:47:49	2022-09-02 10:47:49
\.


--
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categories_id_seq', 4, true);


--
-- Name: companies_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.companies_id_seq', 4, true);


--
-- Name: entries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.entries_id_seq', 1, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: ingredient_products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ingredient_products_id_seq', 56, true);


--
-- Name: ingredients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ingredients_id_seq', 73, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 15, true);


--
-- Name: optional_inputs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.optional_inputs_id_seq', 1, false);


--
-- Name: parts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.parts_id_seq', 10, true);


--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 5, true);


--
-- Name: products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.products_id_seq', 48, true);


--
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.roles_id_seq', 2, true);


--
-- Name: stores_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.stores_id_seq', 3, true);


--
-- Name: units_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.units_id_seq', 8, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 3, true);


--
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);


--
-- Name: categories categories_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_slug_unique UNIQUE (slug);


--
-- Name: categories categories_title_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_title_unique UNIQUE (title);


--
-- Name: companies companies_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.companies
    ADD CONSTRAINT companies_pkey PRIMARY KEY (id);


--
-- Name: entries entries_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.entries
    ADD CONSTRAINT entries_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: ingredient_products ingredient_products_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ingredient_products
    ADD CONSTRAINT ingredient_products_pkey PRIMARY KEY (id);


--
-- Name: ingredients ingredients_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ingredients
    ADD CONSTRAINT ingredients_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: optional_inputs optional_inputs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.optional_inputs
    ADD CONSTRAINT optional_inputs_pkey PRIMARY KEY (id);


--
-- Name: parts parts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parts
    ADD CONSTRAINT parts_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- Name: products products_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- Name: stores stores_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.stores
    ADD CONSTRAINT stores_pkey PRIMARY KEY (id);


--
-- Name: units units_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.units
    ADD CONSTRAINT units_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_phone_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_phone_unique UNIQUE (phone);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- Name: ingredient_products ingredient_products_ingredient_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ingredient_products
    ADD CONSTRAINT ingredient_products_ingredient_id_foreign FOREIGN KEY (ingredient_id) REFERENCES public.ingredients(id) ON DELETE CASCADE;


--
-- Name: ingredient_products ingredient_products_product_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ingredient_products
    ADD CONSTRAINT ingredient_products_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.products(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

