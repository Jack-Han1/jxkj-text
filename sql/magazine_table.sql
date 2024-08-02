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

 INSERT INTO jingxin.magazine (title, text, date, url, img, status, sort, update_time) 
 VALUES (' 精信科技总裁李文帅出席武汉市高新技术产业会...', '6月25日，由武汉市人民政府主办的武汉光谷高新技术产业合作大会在武汉举行。会签武汉市市委书记...',
  '2023-06-25', 'https://s.dps.cn/go/f691afe0322c6e6366088e83d4d81267', 'https://sf.dps.cn/thn/202406/f691afe0322c6e6366088e83d4d81267.jpg', 1, 0, '2024-07-31 21:25:20');


  alter table article
    add clicks int default 0 not null comment '点击量';