
   INFO  Preparing database.  

  Creating migration table ................................................................................................................ 9ms DONE

   INFO  Running migrations.  

  2014_10_12_100000_create_password_reset_tokens_table .............................................................................................  
  ⇂ create table "password_reset_tokens" ("email" varchar(255) not null, "token" varchar(255) not null, "created_at" timestamp(0) without time zone null)  
  ⇂ alter table "password_reset_tokens" add primary key ("email")  
  2019_08_19_000000_create_failed_jobs_table .......................................................................................................  
  ⇂ create table "failed_jobs" ("id" bigserial not null primary key, "uuid" varchar(255) not null, "connection" text not null, "queue" text not null, "payload" text not null, "exception" text not null, "failed_at" timestamp(0) without time zone not null default CURRENT_TIMESTAMP)  
  ⇂ alter table "failed_jobs" add constraint "failed_jobs_uuid_unique" unique ("uuid")  
  2019_12_14_000001_create_personal_access_tokens_table ............................................................................................  
  ⇂ create table "personal_access_tokens" ("id" bigserial not null primary key, "tokenable_type" varchar(255) not null, "tokenable_id" bigint not null, "name" varchar(255) not null, "token" varchar(64) not null, "abilities" text null, "last_used_at" timestamp(0) without time zone null, "expires_at" timestamp(0) without time zone null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)  
  ⇂ create index "personal_access_tokens_tokenable_type_tokenable_id_index" on "personal_access_tokens" ("tokenable_type", "tokenable_id")  
  ⇂ alter table "personal_access_tokens" add constraint "personal_access_tokens_token_unique" unique ("token")  
  2024_04_08_000002_create_users_table .............................................................................................................  
  ⇂ create table "users" ("id" bigserial not null primary key, "name" varchar(255) not null, "email" varchar(255) not null, "email_verified_at" timestamp(0) without time zone null, "password" varchar(255) not null, "remember_token" varchar(100) null, "role" varchar(255) check ("role" in ('User', 'Admin')) not null default 'User', "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)  
  ⇂ alter table "users" add constraint "users_email_unique" unique ("email")  
  2024_04_08_000003_create_categories_table ........................................................................................................  
  ⇂ create table "categories" ("id" bigserial not null primary key, "title" varchar(25) not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null, "deleted_at" timestamp(0) without time zone null)  
  ⇂ insert into "categories" ("title", "created_at", "updated_at") values ('Plants', '2024-05-06 07:17:19', '2024-05-06 07:17:19')  
  ⇂ insert into "categories" ("title", "created_at", "updated_at") values ('Gardening Tools', '2024-05-06 07:17:19', '2024-05-06 07:17:19')  
  ⇂ insert into "categories" ("title", "created_at", "updated_at") values ('Seeds', '2024-05-06 07:17:19', '2024-05-06 07:17:19')  
  ⇂ insert into "categories" ("title", "created_at", "updated_at") values ('Garden Care', '2024-05-06 07:17:19', '2024-05-06 07:17:19')  
  2024_04_08_000004_create_products_table ..........................................................................................................  
  ⇂ create table "products" ("id" bigserial not null primary key, "productCode" varchar(25) not null, "title" varchar(100) not null, "height" varchar(10) not null, "country" varchar(20) not null, "type" varchar(10) not null, "description" text not null, "price" decimal(8, 2) not null, "stockQuantity" integer not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null, "category_id" bigint not null, "deleted_at" timestamp(0) without time zone null)  
  ⇂ alter table "products" add constraint "products_category_id_foreign" foreign key ("category_id") references "categories" ("id")  
  2024_04_08_000005_create_images_table ............................................................................................................  
  ⇂ create table "images" ("id" bigserial not null primary key, "title" varchar(100) not null, "imagePath" varchar(255) not null, "altText" varchar(100) not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null, "product_id" bigint not null, "is_titular" boolean not null default '0')  
  ⇂ alter table "images" add constraint "images_product_id_foreign" foreign key ("product_id") references "products" ("id") on delete cascade  
  2024_04_08_000006_create_tags_table ..............................................................................................................  
  ⇂ create table "tags" ("id" bigserial not null primary key, "title" varchar(25) not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)  
  2024_04_08_000007_create_product_tags_table ......................................................................................................  
  ⇂ create table "product_tags" ("product_id" bigint not null, "tag_id" bigint not null)  
  ⇂ alter table "product_tags" add constraint "product_tags_product_id_foreign" foreign key ("product_id") references "products" ("id") on delete cascade  
  ⇂ alter table "product_tags" add constraint "product_tags_tag_id_foreign" foreign key ("tag_id") references "tags" ("id") on delete cascade  
  2024_04_08_000008_create_addresses_table .........................................................................................................  
  ⇂ create table "addresses" ("id" bigserial not null primary key, "apartmentNumber" varchar(15) not null, "address" varchar(100) not null, "zipcode" varchar(20) not null, "city" varchar(50) not null, "created_at" timestamp(0) without time zone not null)  
  2024_04_08_000009_create_shipping_infos_table ....................................................................................................  
  ⇂ create table "shipping_infos" ("id" bigserial not null primary key, "firstname" varchar(50) not null, "lastname" varchar(50) not null, "phoneNumber" varchar(20) not null, "email" varchar(254) not null, "note" text null, "delivery" varchar(255) check ("delivery" in ('Courier', 'Us', 'Personal')) not null, "address_id" bigint not null, "created_at" timestamp(0) without time zone not null)  
  ⇂ alter table "shipping_infos" add constraint "shipping_infos_address_id_foreign" foreign key ("address_id") references "addresses" ("id") on delete cascade  
  2024_04_08_000010_create_orders_table ............................................................................................................  
  ⇂ create table "orders" ("id" bigserial not null primary key, "totalPrice" decimal(10, 2) not null, "payment" varchar(255) check ("payment" in ('Card', 'Google Pay')) not null, "created_at" timestamp(0) without time zone not null, "user_id" bigint not null, "shipping_id" bigint not null)  
  ⇂ alter table "orders" add constraint "orders_user_id_foreign" foreign key ("user_id") references "users" ("id") on delete cascade  
  ⇂ alter table "orders" add constraint "orders_shipping_id_foreign" foreign key ("shipping_id") references "shipping_infos" ("id") on delete cascade  
  2024_04_08_000011_create_carts_table .............................................................................................................  
  ⇂ create table "carts" ("id" bigserial not null primary key, "total_price" decimal(10, 2) not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null, "user_id" bigint not null)  
  ⇂ alter table "carts" add constraint "carts_user_id_foreign" foreign key ("user_id") references "users" ("id") on delete cascade  
  2024_04_08_000012_create_cart_items_table ........................................................................................................  
  ⇂ create table "cart_items" ("id" bigserial not null primary key, "quantity" integer not null, "price_summary" decimal(10, 2) not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null, "cart_id" bigint not null, "product_id" bigint not null)  
  ⇂ alter table "cart_items" add constraint "cart_items_cart_id_foreign" foreign key ("cart_id") references "carts" ("id") on delete cascade  
  ⇂ alter table "cart_items" add constraint "cart_items_product_id_foreign" foreign key ("product_id") references "products" ("id") on delete cascade  
  2024_04_08_000013_create_order_items_table .......................................................................................................  
  ⇂ create table "order_items" ("id" bigserial not null primary key, "quantity" integer not null, "priceSummary" decimal(10, 2) not null, "created_at" timestamp(0) without time zone null, "order_id" bigint not null, "product_id" bigint not null)  
  ⇂ alter table "order_items" add constraint "order_items_order_id_foreign" foreign key ("order_id") references "orders" ("id") on delete cascade  
  ⇂ alter table "order_items" add constraint "order_items_product_id_foreign" foreign key ("product_id") references "products" ("id") on delete cascade  
  2024_05_01_144025_make_product_id_nullable_in_images_table .......................................................................................  
  ⇂ alter table "images" alter column "product_id" type bigint, alter column "product_id" drop not null, alter column "product_id" drop default, alter column "product_id" drop identity if exists  
  ⇂ comment on column "images"."product_id" is NULL  

