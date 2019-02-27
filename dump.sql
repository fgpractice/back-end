--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.10
-- Dumped by pg_dump version 9.6.10

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- Name: category_ids; Type: SEQUENCE; Schema: public; Owner: frigate_user
--

CREATE SEQUENCE public.category_ids
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.category_ids OWNER TO frigate_user;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: category; Type: TABLE; Schema: public; Owner: frigate_user
--

CREATE TABLE public.category (
    id integer DEFAULT nextval('public.category_ids'::regclass) NOT NULL,
    name_category character varying(100) NOT NULL
);


ALTER TABLE public.category OWNER TO frigate_user;

--
-- Name: market_ids; Type: SEQUENCE; Schema: public; Owner: frigate_user
--

CREATE SEQUENCE public.market_ids
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.market_ids OWNER TO frigate_user;

--
-- Name: market; Type: TABLE; Schema: public; Owner: frigate_user
--

CREATE TABLE public.market (
    id integer DEFAULT nextval('public.market_ids'::regclass) NOT NULL,
    user_id integer NOT NULL,
    type_market character varying(100),
    name_market character varying(200) NOT NULL,
    name_owner character varying(200),
    contact character varying(100),
    address_market character varying(200),
    bank_info character varying(100)
);


ALTER TABLE public.market OWNER TO frigate_user;

--
-- Name: order_ids; Type: SEQUENCE; Schema: public; Owner: frigate_user
--

CREATE SEQUENCE public.order_ids
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.order_ids OWNER TO frigate_user;

--
-- Name: order; Type: TABLE; Schema: public; Owner: frigate_user
--

CREATE TABLE public."order" (
    id integer DEFAULT nextval('public.order_ids'::regclass) NOT NULL,
    user_id integer NOT NULL,
    market_id integer NOT NULL,
    date_order date NOT NULL,
    date_payment date
);


ALTER TABLE public."order" OWNER TO frigate_user;

--
-- Name: order_product_ids; Type: SEQUENCE; Schema: public; Owner: frigate_user
--

CREATE SEQUENCE public.order_product_ids
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.order_product_ids OWNER TO frigate_user;

--
-- Name: order_product; Type: TABLE; Schema: public; Owner: frigate_user
--

CREATE TABLE public.order_product (
    id integer DEFAULT nextval('public.order_product_ids'::regclass) NOT NULL,
    order_id integer NOT NULL,
    product_id integer NOT NULL,
    price_list_id integer NOT NULL,
    total_count integer NOT NULL,
    total_amount numeric(8,2) NOT NULL
);


ALTER TABLE public.order_product OWNER TO frigate_user;

--
-- Name: price_list_ids; Type: SEQUENCE; Schema: public; Owner: frigate_user
--

CREATE SEQUENCE public.price_list_ids
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.price_list_ids OWNER TO frigate_user;

--
-- Name: price_list; Type: TABLE; Schema: public; Owner: frigate_user
--

CREATE TABLE public.price_list (
    id integer DEFAULT nextval('public.price_list_ids'::regclass) NOT NULL,
    product_id integer NOT NULL,
    price numeric(8,2) NOT NULL,
    supplier character varying(100)
);


ALTER TABLE public.price_list OWNER TO frigate_user;

--
-- Name: product_ids; Type: SEQUENCE; Schema: public; Owner: frigate_user
--

CREATE SEQUENCE public.product_ids
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.product_ids OWNER TO frigate_user;

--
-- Name: product; Type: TABLE; Schema: public; Owner: frigate_user
--

CREATE TABLE public.product (
    id integer DEFAULT nextval('public.product_ids'::regclass) NOT NULL,
    category_id integer NOT NULL,
    name_product character varying(200) NOT NULL,
    description character varying(500),
    measure_unit character varying(5),
    photo character varying(100)
);


ALTER TABLE public.product OWNER TO frigate_user;

--
-- Name: user_ids; Type: SEQUENCE; Schema: public; Owner: frigate_user
--

CREATE SEQUENCE public.user_ids
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_ids OWNER TO frigate_user;

--
-- Name: user; Type: TABLE; Schema: public; Owner: frigate_user
--

CREATE TABLE public."user" (
    id integer DEFAULT nextval('public.user_ids'::regclass) NOT NULL,
    login character varying(50) NOT NULL,
    password character varying(50) NOT NULL,
    email character varying(100),
    phone character varying(50),
    role integer NOT NULL,
    device character varying(50),
    name_user character varying(100)
);


ALTER TABLE public."user" OWNER TO frigate_user;

--
-- Data for Name: category; Type: TABLE DATA; Schema: public; Owner: frigate_user
--

COPY public.category (id, name_category) FROM stdin;
1	Овощи и фрукты
2	Красота и здоровье
3	Товары для дома
4	Товары для кухни
5	Офисная техника и мебель
6	Ноутбуки
7	Смартфоны
8	Телевизоры и медиа
9	Аудиотехника
10	Инструменты
\.


--
-- Name: category_ids; Type: SEQUENCE SET; Schema: public; Owner: frigate_user
--

SELECT pg_catalog.setval('public.category_ids', 10, true);


--
-- Data for Name: market; Type: TABLE DATA; Schema: public; Owner: frigate_user
--

COPY public.market (id, user_id, type_market, name_market, name_owner, contact, address_market, bank_info) FROM stdin;
1	1	Торговый центр	Космос	Иванов Иван Иванович	+79211234567	Баклановский проспект 120	612235546548
3	1	Торговый центр	Платовский	Артемьев Артем Наумович	+79881234567	пр. Платовский 71	612231546548
2	1	Торговый центр	Вавилон	Ершов Тимофей Евсеевич	+79111234567	пр. Космонавтов 85	612231546548
\.


--
-- Name: market_ids; Type: SEQUENCE SET; Schema: public; Owner: frigate_user
--

SELECT pg_catalog.setval('public.market_ids', 3, true);


--
-- Data for Name: order; Type: TABLE DATA; Schema: public; Owner: frigate_user
--

COPY public."order" (id, user_id, market_id, date_order, date_payment) FROM stdin;
1	1	3	2019-02-27	\N
\.


--
-- Name: order_ids; Type: SEQUENCE SET; Schema: public; Owner: frigate_user
--

SELECT pg_catalog.setval('public.order_ids', 1, true);


--
-- Data for Name: order_product; Type: TABLE DATA; Schema: public; Owner: frigate_user
--

COPY public.order_product (id, order_id, product_id, price_list_id, total_count, total_amount) FROM stdin;
1	1	3	8	3	90000.00
\.


--
-- Name: order_product_ids; Type: SEQUENCE SET; Schema: public; Owner: frigate_user
--

SELECT pg_catalog.setval('public.order_product_ids', 1, true);


--
-- Data for Name: price_list; Type: TABLE DATA; Schema: public; Owner: frigate_user
--

COPY public.price_list (id, product_id, price, supplier) FROM stdin;
1	4	400.00	SVEN
2	4	450.00	SVEN
3	4	500.00	SVEN
4	2	90000.00	Sharp
5	2	95000.00	Sharp
6	2	100000.00	Sharp
7	3	29000.00	HP
8	3	30000.00	HP
9	3	35000.00	HP
10	1	9000.00	Neffoc
\.


--
-- Name: price_list_ids; Type: SEQUENCE SET; Schema: public; Owner: frigate_user
--

SELECT pg_catalog.setval('public.price_list_ids', 10, true);


--
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: frigate_user
--

COPY public.product (id, category_id, name_product, description, measure_unit, photo) FROM stdin;
1	7	Neffoc C5L	Ультратонкий телефон	шт	neffoc5cl.jpg
2	4	Холодильник Sharp SJXG55PMSL	Непревзойденный холодильник в повседневности	шт	sharpsjxg55pmsl.jpg
3	6	Ноутбук HP 250 G6	Неплохой ноутбук	шт	hp250g6.jpg
4	9	Колонки 2.0 SVEN 120	Обычные колонки для дома	шт	sven120.jpg
\.


--
-- Name: product_ids; Type: SEQUENCE SET; Schema: public; Owner: frigate_user
--

SELECT pg_catalog.setval('public.product_ids', 4, true);


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: frigate_user
--

COPY public."user" (id, login, password, email, phone, role, device, name_user) FROM stdin;
1	admin	admin			1		
2	spiridonov	spiridonov			0		Спиридонов Александр
3	bartsevich	bartsevich			0		Барцевич Роман
\.


--
-- Name: user_ids; Type: SEQUENCE SET; Schema: public; Owner: frigate_user
--

SELECT pg_catalog.setval('public.user_ids', 3, true);


--
-- Name: category category_pk; Type: CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY public.category
    ADD CONSTRAINT category_pk PRIMARY KEY (id);


--
-- Name: market market_pk; Type: CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY public.market
    ADD CONSTRAINT market_pk PRIMARY KEY (id);


--
-- Name: order order_pk; Type: CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY public."order"
    ADD CONSTRAINT order_pk PRIMARY KEY (id);


--
-- Name: order_product order_product_pk; Type: CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY public.order_product
    ADD CONSTRAINT order_product_pk PRIMARY KEY (id);


--
-- Name: price_list price_list_pk; Type: CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY public.price_list
    ADD CONSTRAINT price_list_pk PRIMARY KEY (id);


--
-- Name: product product_pk; Type: CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY public.product
    ADD CONSTRAINT product_pk PRIMARY KEY (id);


--
-- Name: user user_pk; Type: CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_pk PRIMARY KEY (id);


--
-- Name: product category_product_fk; Type: FK CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY public.product
    ADD CONSTRAINT category_product_fk FOREIGN KEY (category_id) REFERENCES public.category(id);


--
-- Name: order market_order_fk; Type: FK CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY public."order"
    ADD CONSTRAINT market_order_fk FOREIGN KEY (market_id) REFERENCES public.market(id);


--
-- Name: order_product order_order_product_fk; Type: FK CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY public.order_product
    ADD CONSTRAINT order_order_product_fk FOREIGN KEY (order_id) REFERENCES public."order"(id);


--
-- Name: order_product price_list_order_product_fk; Type: FK CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY public.order_product
    ADD CONSTRAINT price_list_order_product_fk FOREIGN KEY (price_list_id) REFERENCES public.price_list(id);


--
-- Name: order_product product_order_product_fk; Type: FK CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY public.order_product
    ADD CONSTRAINT product_order_product_fk FOREIGN KEY (product_id) REFERENCES public.product(id);


--
-- Name: price_list product_price_list_fk; Type: FK CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY public.price_list
    ADD CONSTRAINT product_price_list_fk FOREIGN KEY (product_id) REFERENCES public.product(id);


--
-- Name: market user_market_fk; Type: FK CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY public.market
    ADD CONSTRAINT user_market_fk FOREIGN KEY (user_id) REFERENCES public."user"(id);


--
-- Name: order user_order_fk; Type: FK CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY public."order"
    ADD CONSTRAINT user_order_fk FOREIGN KEY (user_id) REFERENCES public."user"(id);


--
-- PostgreSQL database dump complete
--

