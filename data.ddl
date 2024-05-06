create table migrations
(
    id        serial
        primary key,
    migration varchar(255) not null,
    batch     integer      not null
);

alter table migrations
    owner to postgres;

create table password_reset_tokens
(
    email      varchar(255) not null
        primary key,
    token      varchar(255) not null,
    created_at timestamp(0)
);

alter table password_reset_tokens
    owner to postgres;

create table failed_jobs
(
    id         bigserial
        primary key,
    uuid       varchar(255)                           not null
        constraint failed_jobs_uuid_unique
            unique,
    connection text                                   not null,
    queue      text                                   not null,
    payload    text                                   not null,
    exception  text                                   not null,
    failed_at  timestamp(0) default CURRENT_TIMESTAMP not null
);

alter table failed_jobs
    owner to postgres;

create table personal_access_tokens
(
    id             bigserial
        primary key,
    tokenable_type varchar(255) not null,
    tokenable_id   bigint       not null,
    name           varchar(255) not null,
    token          varchar(64)  not null
        constraint personal_access_tokens_token_unique
            unique,
    abilities      text,
    last_used_at   timestamp(0),
    expires_at     timestamp(0),
    created_at     timestamp(0),
    updated_at     timestamp(0)
);

alter table personal_access_tokens
    owner to postgres;

create index personal_access_tokens_tokenable_type_tokenable_id_index
    on personal_access_tokens (tokenable_type, tokenable_id);

create table users
(
    id                bigserial
        primary key,
    name              varchar(255)                                   not null,
    email             varchar(255)                                   not null
        constraint users_email_unique
            unique,
    email_verified_at timestamp(0),
    password          varchar(255)                                   not null,
    remember_token    varchar(100),
    role              varchar(255) default 'User'::character varying not null
        constraint users_role_check
            check ((role)::text = ANY ((ARRAY ['User'::character varying, 'Admin'::character varying])::text[])),
    created_at        timestamp(0),
    updated_at        timestamp(0)
);

alter table users
    owner to postgres;

create table categories
(
    id         bigserial
        primary key,
    title      varchar(25) not null,
    created_at timestamp(0),
    updated_at timestamp(0),
    deleted_at timestamp(0)
);

alter table categories
    owner to postgres;

create table products
(
    id              bigserial
        primary key,
    "productCode"   varchar(25)   not null,
    title           varchar(100)  not null,
    height          varchar(10)   not null,
    country         varchar(20)   not null,
    type            varchar(10)   not null,
    description     text          not null,
    price           numeric(8, 2) not null,
    "stockQuantity" integer       not null,
    created_at      timestamp(0),
    updated_at      timestamp(0),
    category_id     bigint        not null
        constraint products_category_id_foreign
            references categories,
    deleted_at      timestamp(0)
);

alter table products
    owner to postgres;

create table images
(
    id          bigserial
        primary key,
    title       varchar(100)          not null,
    "imagePath" varchar(255)          not null,
    "altText"   varchar(100)          not null,
    created_at  timestamp(0),
    updated_at  timestamp(0),
    product_id  bigint
        constraint images_product_id_foreign
            references products
            on delete cascade,
    is_titular  boolean default false not null
);

alter table images
    owner to postgres;

create table tags
(
    id         bigserial
        primary key,
    title      varchar(25) not null,
    created_at timestamp(0),
    updated_at timestamp(0)
);

alter table tags
    owner to postgres;

create table product_tags
(
    product_id bigint not null
        constraint product_tags_product_id_foreign
            references products
            on delete cascade,
    tag_id     bigint not null
        constraint product_tags_tag_id_foreign
            references tags
            on delete cascade
);

alter table product_tags
    owner to postgres;

create table addresses
(
    id                bigserial
        primary key,
    "apartmentNumber" varchar(15)  not null,
    address           varchar(100) not null,
    zipcode           varchar(20)  not null,
    city              varchar(50)  not null,
    created_at        timestamp(0) not null
);

alter table addresses
    owner to postgres;

create table shipping_infos
(
    id            bigserial
        primary key,
    firstname     varchar(50)  not null,
    lastname      varchar(50)  not null,
    "phoneNumber" varchar(20)  not null,
    email         varchar(254) not null,
    note          text,
    delivery      varchar(255) not null
        constraint shipping_infos_delivery_check
            check ((delivery)::text = ANY
                   ((ARRAY ['Courier'::character varying, 'Us'::character varying, 'Personal'::character varying])::text[])),
    address_id    bigint       not null
        constraint shipping_infos_address_id_foreign
            references addresses
            on delete cascade,
    created_at    timestamp(0) not null
);

alter table shipping_infos
    owner to postgres;

create table orders
(
    id           bigserial
        primary key,
    "totalPrice" numeric(10, 2) not null,
    payment      varchar(255)   not null
        constraint orders_payment_check
            check ((payment)::text = ANY
                   ((ARRAY ['Card'::character varying, 'Google Pay'::character varying])::text[])),
    created_at   timestamp(0)   not null,
    user_id      bigint         not null
        constraint orders_user_id_foreign
            references users
            on delete cascade,
    shipping_id  bigint         not null
        constraint orders_shipping_id_foreign
            references shipping_infos
            on delete cascade
);

alter table orders
    owner to postgres;

create table carts
(
    id          bigserial
        primary key,
    total_price numeric(10, 2) not null,
    created_at  timestamp(0),
    updated_at  timestamp(0),
    user_id     bigint         not null
        constraint carts_user_id_foreign
            references users
            on delete cascade
);

alter table carts
    owner to postgres;

create table cart_items
(
    id            bigserial
        primary key,
    quantity      integer        not null,
    price_summary numeric(10, 2) not null,
    created_at    timestamp(0),
    updated_at    timestamp(0),
    cart_id       bigint         not null
        constraint cart_items_cart_id_foreign
            references carts
            on delete cascade,
    product_id    bigint         not null
        constraint cart_items_product_id_foreign
            references products
            on delete cascade
);

alter table cart_items
    owner to postgres;

create table order_items
(
    id             bigserial
        primary key,
    quantity       integer        not null,
    "priceSummary" numeric(10, 2) not null,
    created_at     timestamp(0),
    order_id       bigint         not null
        constraint order_items_order_id_foreign
            references orders
            on delete cascade,
    product_id     bigint         not null
        constraint order_items_product_id_foreign
            references products
            on delete cascade
);

alter table order_items
    owner to postgres;


