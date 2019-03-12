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

--
-- Name: category_ids; Type: SEQUENCE; Schema: public; Owner: frigate_user
--

CREATE SEQUENCE category_ids
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.category_ids OWNER TO frigate_user;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: category; Type: TABLE; Schema: public; Owner: frigate_user; Tablespace: 
--

CREATE TABLE category (
    id integer DEFAULT nextval('category_ids'::regclass) NOT NULL,
    name_category character varying(100) NOT NULL
);


ALTER TABLE public.category OWNER TO frigate_user;

--
-- Name: market_ids; Type: SEQUENCE; Schema: public; Owner: frigate_user
--

CREATE SEQUENCE market_ids
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.market_ids OWNER TO frigate_user;

--
-- Name: market; Type: TABLE; Schema: public; Owner: frigate_user; Tablespace: 
--

CREATE TABLE market (
    id integer DEFAULT nextval('market_ids'::regclass) NOT NULL,
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

CREATE SEQUENCE order_ids
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.order_ids OWNER TO frigate_user;

--
-- Name: order_product_ids; Type: SEQUENCE; Schema: public; Owner: frigate_user
--

CREATE SEQUENCE order_product_ids
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.order_product_ids OWNER TO frigate_user;

--
-- Name: order_product; Type: TABLE; Schema: public; Owner: frigate_user; Tablespace: 
--

CREATE TABLE order_product (
    id integer DEFAULT nextval('order_product_ids'::regclass) NOT NULL,
    order_id integer NOT NULL,
    product_id integer NOT NULL,
    price_list_id integer NOT NULL,
    total_count integer NOT NULL,
    total_amount numeric(8,2) NOT NULL
);


ALTER TABLE public.order_product OWNER TO frigate_user;

--
-- Name: orders; Type: TABLE; Schema: public; Owner: frigate_user; Tablespace: 
--

CREATE TABLE orders (
    id integer DEFAULT nextval('order_ids'::regclass) NOT NULL,
    user_id integer NOT NULL,
    market_id integer NOT NULL,
    date_order date NOT NULL,
    date_payment date
);


ALTER TABLE public.orders OWNER TO frigate_user;

--
-- Name: price_list_ids; Type: SEQUENCE; Schema: public; Owner: frigate_user
--

CREATE SEQUENCE price_list_ids
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.price_list_ids OWNER TO frigate_user;

--
-- Name: price_list; Type: TABLE; Schema: public; Owner: frigate_user; Tablespace: 
--

CREATE TABLE price_list (
    id integer DEFAULT nextval('price_list_ids'::regclass) NOT NULL,
    product_id integer NOT NULL,
    price numeric(8,2) NOT NULL,
    supplier character varying(100)
);


ALTER TABLE public.price_list OWNER TO frigate_user;

--
-- Name: product_ids; Type: SEQUENCE; Schema: public; Owner: frigate_user
--

CREATE SEQUENCE product_ids
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.product_ids OWNER TO frigate_user;

--
-- Name: product; Type: TABLE; Schema: public; Owner: frigate_user; Tablespace: 
--

CREATE TABLE product (
    id integer DEFAULT nextval('product_ids'::regclass) NOT NULL,
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

CREATE SEQUENCE user_ids
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_ids OWNER TO frigate_user;

--
-- Name: users; Type: TABLE; Schema: public; Owner: frigate_user; Tablespace: 
--

CREATE TABLE users (
    id integer DEFAULT nextval('user_ids'::regclass) NOT NULL,
    login character varying(50) NOT NULL,
    password character varying(50) NOT NULL,
    email character varying(100),
    phone character varying(50),
    role integer NOT NULL,
    device character varying(50),
    name_user character varying(100)
);


ALTER TABLE public.users OWNER TO frigate_user;

--
-- Name: category_pk; Type: CONSTRAINT; Schema: public; Owner: frigate_user; Tablespace: 
--

ALTER TABLE ONLY category
    ADD CONSTRAINT category_pk PRIMARY KEY (id);


--
-- Name: market_pk; Type: CONSTRAINT; Schema: public; Owner: frigate_user; Tablespace: 
--

ALTER TABLE ONLY market
    ADD CONSTRAINT market_pk PRIMARY KEY (id);


--
-- Name: order_pk; Type: CONSTRAINT; Schema: public; Owner: frigate_user; Tablespace: 
--

ALTER TABLE ONLY orders
    ADD CONSTRAINT order_pk PRIMARY KEY (id);


--
-- Name: order_product_pk; Type: CONSTRAINT; Schema: public; Owner: frigate_user; Tablespace: 
--

ALTER TABLE ONLY order_product
    ADD CONSTRAINT order_product_pk PRIMARY KEY (id);


--
-- Name: price_list_pk; Type: CONSTRAINT; Schema: public; Owner: frigate_user; Tablespace: 
--

ALTER TABLE ONLY price_list
    ADD CONSTRAINT price_list_pk PRIMARY KEY (id);


--
-- Name: product_pk; Type: CONSTRAINT; Schema: public; Owner: frigate_user; Tablespace: 
--

ALTER TABLE ONLY product
    ADD CONSTRAINT product_pk PRIMARY KEY (id);


--
-- Name: user_pk; Type: CONSTRAINT; Schema: public; Owner: frigate_user; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT user_pk PRIMARY KEY (id);


--
-- Name: category_product_fk; Type: FK CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY product
    ADD CONSTRAINT category_product_fk FOREIGN KEY (category_id) REFERENCES category(id);


--
-- Name: market_order_fk; Type: FK CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY orders
    ADD CONSTRAINT market_order_fk FOREIGN KEY (market_id) REFERENCES market(id);


--
-- Name: order_order_product_fk; Type: FK CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY order_product
    ADD CONSTRAINT order_order_product_fk FOREIGN KEY (order_id) REFERENCES orders(id);


--
-- Name: price_list_order_product_fk; Type: FK CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY order_product
    ADD CONSTRAINT price_list_order_product_fk FOREIGN KEY (price_list_id) REFERENCES price_list(id);


--
-- Name: product_order_product_fk; Type: FK CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY order_product
    ADD CONSTRAINT product_order_product_fk FOREIGN KEY (product_id) REFERENCES product(id);


--
-- Name: product_price_list_fk; Type: FK CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY price_list
    ADD CONSTRAINT product_price_list_fk FOREIGN KEY (product_id) REFERENCES product(id);


--
-- Name: user_market_fk; Type: FK CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY market
    ADD CONSTRAINT user_market_fk FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: user_order_fk; Type: FK CONSTRAINT; Schema: public; Owner: frigate_user
--

ALTER TABLE ONLY orders
    ADD CONSTRAINT user_order_fk FOREIGN KEY (user_id) REFERENCES users(id);


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

