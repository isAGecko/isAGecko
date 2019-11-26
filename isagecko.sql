/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     23/11/2019 10:53:31                          */
/*==============================================================*/


drop table if exists ABSENSI;

drop table if exists JABATAN;

drop table if exists PEGAWAI;

drop table if exists POINT;

/*==============================================================*/
/* Table: ABSENSI                                               */
/*==============================================================*/
create table ABSENSI
(
   ID_ABSENSI           int not null,
   ID_PEGAWAI           varchar(11),
   TANGGAL              date,
   JAM                  time,
   TERLAMBAT            time,
   KETERANGAN           varchar(1000),
   DETAIL               varchar(1000),
   FOTO                 varchar(100),
   POINT                int,
   primary key (ID_ABSENSI)
);

/*==============================================================*/
/* Table: JABATAN                                               */
/*==============================================================*/
create table JABATAN
(
   ID_JABATAN           int not null,
   ID_PEGAWAI           varchar(11),
   NAMA_JABATAN         varchar(100),
   primary key (ID_JABATAN)
);

/*==============================================================*/
/* Table: PEGAWAI                                               */
/*==============================================================*/
create table PEGAWAI
(
   ID_PEGAWAI           varchar(11) not null,
   ID_POINT             int,
   ID_JABATAN           int,
   ID_ABSENSI           int,
   NAMA_PEGAWAI         varchar(100),
   NOMOR_TELP           varchar(12),
   ALAMAT               varchar(100),
   EMAIL                varchar(100),
   GENDER               varchar(100),
   PASSWORD             varchar(100),
   primary key (ID_PEGAWAI)
);

/*==============================================================*/
/* Table: POINT                                                 */
/*==============================================================*/
create table POINT
(
   ID_POINT             int not null,
   ID_PEGAWAI           varchar(11),
   TOTAL_POINT          int,
   primary key (ID_POINT)
);

alter table ABSENSI add constraint FK_MELAKUKAN_ABSENSI2 foreign key (ID_PEGAWAI)
      references PEGAWAI (ID_PEGAWAI) on delete restrict on update restrict;

alter table JABATAN add constraint FK_JABATAN_PEGAWAI foreign key (ID_PEGAWAI)
      references PEGAWAI (ID_PEGAWAI) on delete restrict on update restrict;

alter table PEGAWAI add constraint FK_JABATAN_PEGAWAI2 foreign key (ID_JABATAN)
      references JABATAN (ID_JABATAN) on delete restrict on update restrict;

alter table PEGAWAI add constraint FK_MELAKUKAN_ABSENSI foreign key (ID_ABSENSI)
      references ABSENSI (ID_ABSENSI) on delete restrict on update restrict;

alter table PEGAWAI add constraint FK_TOTAL_POINT foreign key (ID_POINT)
      references POINT (ID_POINT) on delete restrict on update restrict;

alter table POINT add constraint FK_TOTAL_POINT2 foreign key (ID_PEGAWAI)
      references PEGAWAI (ID_PEGAWAI) on delete restrict on update restrict;

