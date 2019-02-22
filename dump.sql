--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
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


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: group_product; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.group_product (
    id_group integer NOT NULL,
    name_group character varying(100)
);


ALTER TABLE public.group_product OWNER TO postgres;

--
-- Name: group_product_id_group_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.group_product_id_group_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.group_product_id_group_seq OWNER TO postgres;

--
-- Name: group_product_id_group_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.group_product_id_group_seq OWNED BY public.group_product.id_group;


--
-- Name: id_user_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.id_user_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.id_user_seq OWNER TO postgres;

--
-- Name: orders; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.orders (
    id_order integer NOT NULL,
    data_order date,
    data_payment date,
    data_sending date,
    id_trading integer,
    id_price integer,
    count_order numeric(10,2),
    id_user integer
);


ALTER TABLE public.orders OWNER TO postgres;

--
-- Name: orders_id_order_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.orders_id_order_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.orders_id_order_seq OWNER TO postgres;

--
-- Name: orders_id_order_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.orders_id_order_seq OWNED BY public.orders.id_order;


--
-- Name: price_list; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.price_list (
    id_price integer NOT NULL,
    price integer,
    id_product integer,
    supplier character varying(100)
);


ALTER TABLE public.price_list OWNER TO postgres;

--
-- Name: price_id_price_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.price_id_price_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.price_id_price_seq OWNER TO postgres;

--
-- Name: price_id_price_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.price_id_price_seq OWNED BY public.price_list.id_price;


--
-- Name: product; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.product (
    id_product integer NOT NULL,
    name_product character varying(200),
    description character varying(500),
    measure_unit character varying(10),
    photo character varying(100),
    id_group integer
);


ALTER TABLE public.product OWNER TO postgres;

--
-- Name: product_id_product_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.product_id_product_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.product_id_product_seq OWNER TO postgres;

--
-- Name: product_id_product_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.product_id_product_seq OWNED BY public.product.id_product;


--
-- Name: trading; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.trading (
    id_trading integer NOT NULL,
    type_trading character varying(100),
    name_trading character varying(200),
    fio character varying(200),
    contact character varying(100),
    address_trading character varying(200),
    bank_account character varying(100)
);


ALTER TABLE public.trading OWNER TO postgres;

--
-- Name: trading_id_trading_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.trading_id_trading_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.trading_id_trading_seq OWNER TO postgres;

--
-- Name: trading_id_trading_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.trading_id_trading_seq OWNED BY public.trading.id_trading;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.users (
    id_user integer DEFAULT nextval('public.id_user_seq'::regclass) NOT NULL,
    login character varying(50),
    password character varying(50),
    first_name character varying(100),
    email character varying(100),
    phone character varying(50),
    device character varying(50),
    role integer
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: id_group; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.group_product ALTER COLUMN id_group SET DEFAULT nextval('public.group_product_id_group_seq'::regclass);


--
-- Name: id_order; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders ALTER COLUMN id_order SET DEFAULT nextval('public.orders_id_order_seq'::regclass);


--
-- Name: id_price; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.price_list ALTER COLUMN id_price SET DEFAULT nextval('public.price_id_price_seq'::regclass);


--
-- Name: id_product; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product ALTER COLUMN id_product SET DEFAULT nextval('public.product_id_product_seq'::regclass);


--
-- Name: id_trading; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.trading ALTER COLUMN id_trading SET DEFAULT nextval('public.trading_id_trading_seq'::regclass);


--
-- Data for Name: group_product; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.group_product (id_group, name_group) FROM stdin;
1	Ноутбуки
2	Овощи
3	Фрукты
4	Товары для кухни
5	Красота и здоровье
6	Товары для дома
7	Инструменты
8	Офисная техника и мебель
9	Аудиотехника
10	Смартфоны
11	Телевизоры и медиа
\.


--
-- Name: group_product_id_group_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.group_product_id_group_seq', 11, true);


--
-- Name: id_user_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.id_user_seq', 2, true);


--
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.orders (id_order, data_order, data_payment, data_sending, id_trading, id_price, count_order, id_user) FROM stdin;
\.


--
-- Name: orders_id_order_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.orders_id_order_seq', 1, false);


--
-- Name: price_id_price_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.price_id_price_seq', 10, true);


--
-- Data for Name: price_list; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.price_list (id_price, price, id_product, supplier) FROM stdin;
1	400	4	SVEN
2	450	4	SVEN
3	500	4	SVEN
4	90000	2	Sharp
5	95000	2	Sharp
6	100000	2	Sharp
7	31000	3	HP
8	29000	3	HP
9	30000	3	HP
10	35000	3	HP
\.


--
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.product (id_product, name_product, description, measure_unit, photo, id_group) FROM stdin;
4	Колонки 2.0 SVEN 120	Обычные колонки для дома	шт	sven120.jpg	9
1	Neffoc C5L	Ультратонкий телефон	шт	neffoc5cl.jpg	10
2	Холодильник Sharp SJXG55PMSL	Непревзойденный холодильник в повседневности	шт	sharpsjxg55pmsl.jpg	6
3	Ноутбук HP 250 G6	Неплохой ноутбук	шт	hp250g6.jpg	1
\.


--
-- Name: product_id_product_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.product_id_product_seq', 4, true);


--
-- Data for Name: trading; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.trading (id_trading, type_trading, name_trading, fio, contact, address_trading, bank_account) FROM stdin;
1	Торговый центр	Космос	Сидоров В.В.	sidorov@mail.ru	Баклановский проспект 120	612235546548
2	Торговый центр	Вавилон	Гладунов А.А.	gladunov@mail.ru	пр. Космонавтов 85	612231546548
3	Торговый центр	Вавилония	Воронов А.А.	voronov@mail.ru	Западный	633231546548
\.


--
-- Name: trading_id_trading_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.trading_id_trading_seq', 3, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id_user, login, password, first_name, email, phone, device, role) FROM stdin;
2	admin	admin	\N	\N	\N	\N	1
1	spiridonov	spiridonov	Спиридонов	spiridonov@mail.ru	89604651354	смартфон	0
\.


--
-- Name: group_product_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.group_product
    ADD CONSTRAINT group_product_pkey PRIMARY KEY (id_group);


--
-- Name: orders_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY (id_order);


--
-- Name: price_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.price_list
    ADD CONSTRAINT price_pkey PRIMARY KEY (id_price);


--
-- Name: product_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.product
    ADD CONSTRAINT product_pkey PRIMARY KEY (id_product);


--
-- Name: trading_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.trading
    ADD CONSTRAINT trading_pkey PRIMARY KEY (id_trading);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id_user);


--
-- Name: orders_id_price_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_id_price_fkey FOREIGN KEY (id_price) REFERENCES public.price_list(id_price);


--
-- Name: orders_id_trading_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_id_trading_fkey FOREIGN KEY (id_trading) REFERENCES public.trading(id_trading);


--
-- Name: orders_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.users(id_user);


--
-- Name: price_id_product_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.price_list
    ADD CONSTRAINT price_id_product_fkey FOREIGN KEY (id_product) REFERENCES public.product(id_product);


--
-- Name: product_id_group_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product
    ADD CONSTRAINT product_id_group_fkey FOREIGN KEY (id_group) REFERENCES public.group_product(id_group);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

