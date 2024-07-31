create table magazine
(
    id          int auto_increment comment '月刊id'
        primary key,
    title       varchar(50)  null comment '标题',
    text        varchar(70)  null comment '介绍',
    date        varchar(20)  null comment '日期',
    url         varchar(100) null comment '链接',
    img         varchar(100) null comment '封面图片链接',
    status      int          not null,
    sort        int          not null,
    update_time datetime     null comment '更新时间'
)
    comment '精信月刊';