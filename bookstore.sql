# Host: localhost  (Version: 5.6.12-log)
# Date: 2014-04-24 16:36:38
# Generator: MySQL-Front 5.3  (Build 4.113)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "tb_book"
#

DROP TABLE IF EXISTS `tb_book`;
CREATE TABLE `tb_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `typeid` int(11) NOT NULL DEFAULT '0' COMMENT '分类ID',
  `bookname` varchar(40) NOT NULL DEFAULT '' COMMENT '书名',
  `cnname` varchar(40) DEFAULT NULL COMMENT '中文名称',
  `bookcat` varchar(10) NOT NULL DEFAULT '',
  `pubdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '出版日期',
  `booksize` varbinary(10) NOT NULL,
  `bookversion` varchar(10) NOT NULL DEFAULT '' COMMENT '版本',
  `author` varchar(10) NOT NULL DEFAULT '' COMMENT '作者',
  `translator` varchar(10) DEFAULT NULL COMMENT '翻译者',
  `isbn` varchar(20) NOT NULL DEFAULT '' COMMENT 'ISBN编号',
  `price` float(3,1) DEFAULT NULL COMMENT '价格',
  `pages` int(11) NOT NULL DEFAULT '0' COMMENT '页数',
  `outline` varchar(200) NOT NULL COMMENT '出版日期',
  `dealmount` int(11) NOT NULL COMMENT '成交量',
  `lookmount` int(11) DEFAULT NULL COMMENT '浏览量',
  `discont` int(11) DEFAULT '10' COMMENT '打折',
  `pic` varchar(200) NOT NULL DEFAULT 'NULL' COMMENT '封面路径',
  `storemount` int(11) DEFAULT NULL COMMENT '库存量',
  `packstyle` varchar(20) NOT NULL COMMENT '包装类型',
  `publisher` varchar(20) DEFAULT NULL COMMENT '出版商',
  `author_intro` varchar(255) DEFAULT NULL COMMENT '作者简介',
  `summary` varchar(255) DEFAULT NULL COMMENT '摘要',
  `tag` varchar(255) DEFAULT NULL COMMENT '标签',
  `sub` varchar(10) DEFAULT NULL COMMENT '发布标志',
  PRIMARY KEY (`id`),
  UNIQUE KEY `aaa` (`isbn`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

#
# Data for table "tb_book"
#

/*!40000 ALTER TABLE `tb_book` DISABLE KEYS */;
INSERT INTO `tb_book` VALUES (13,6,'The Moon and Sixpence','月亮和六便士','','0000-00-00 00:00:00',X'','','[英] 毛姆 ','傅惟慈 ','9787532739547',15.0,275,'',0,NULL,10,'http://img5.douban.com/mpic/s2659208.jpg',1,'平装','上海译文出版社','威廉·萨默赛特·毛姆（William Somerset Maugham）于1874年1月25日出生在巴黎。父亲是律师，当时在英国驻法使馆供职。小毛姆不满十岁，父母就先后去世，他被送回英国由伯父抚养。毛姆进坎特伯雷皇家公学之后，由于身材矮小，且严重口吃，经常受到大孩子的欺凌和折磨，有时还遭到冬烘学究的无端羞辱。孤寂凄清的童年生活，在他稚嫩的心灵上投下了痛苦的阴影，养成他孤僻、敏感、内向的性格。幼年的经历对他的世界观和文学创作产生了深刻的影响。1892年初，他去德国海德堡大学学习了一年。在那儿，他接触到德国哲','一个英国证券交易所的经纪人，本已有牢靠的职业和地位、美满的家庭，但却迷恋上绘画，像“被魔鬼附了体”，突然弃家出走，到巴黎去追求绘画的理想。他的行径没有人能够理解。他在异国不仅肉体受着贫穷和饥饿煎熬，而且为了寻找表现手法，精神亦在忍受痛苦折磨。经过一番离奇的遭遇后，主人公最后离开文明世界，远遁到与世隔绝的塔希提岛上。他终于找到灵魂的宁静和适合自己艺术气质的氛围。他同一个土著女子同居，创作出一幅又一幅使后世震惊的杰作。在他染上麻风病双目失明之前，曾在自己住房四壁画了一幅表现伊甸园的伟大作品。但在逝世之前，他却','毛姆 月亮和六便士 小说 英国 外国文学 英国文学 毛姆：月亮和六便士 文学 ','发布'),(14,6,'El amor en los tiempos del cólera','霍乱时期的爱情','','2012-09-01 00:00:00',X'','','[哥伦比亚] 加西亚','杨玲 ','9787544258975',39.5,401,'',0,NULL,10,'http://img5.douban.com/mpic/s11283087.jpg',1,'精装','南海出版公司','加西亚•马尔克斯（Gabriel García Márquez）1927年出生于哥伦比亚马格达莱纳海滨小镇阿拉卡塔卡。童年与外祖父母一起生活。1936年随父母迁居苏克雷。1947年考入波哥大国立大学。1948年因内战辍学，进入报界。五十年代开始出版文学作品。六十年代初移居墨西哥。1967年《百年孤独》问世。1982年获诺贝尔文学奖。1985年出版《霍乱时期的爱情》。加西亚•马尔克斯豆瓣小站：http://site.douban.com/marquez/','★马尔克斯唯一正式授权，首次完整翻译★《霍乱时期的爱情》是我最好的作品，是我发自内心的创作。——加西亚•马尔克斯★这部光芒闪耀、令人心碎的作品是人类有史以来最伟大的爱情小说。——《纽约时报》《霍乱时期的爱情》是加西亚•马尔克斯获得诺贝尔文学奖之后完成的第一部小说。讲述了一段跨越半个多世纪的爱情史诗，穷尽了所有爱情的可能性：忠贞的、隐秘的、粗暴的、羞怯的、柏拉图式的、放荡的、转瞬即逝的、生死相依的……再现了时光的无情流逝，被誉为“人类有史以来最伟大的爱情小说”，是20世纪最重要的经典文学巨著之一。','加西亚-马尔克斯 霍乱时期的爱情 小说 拉美文学 外国文学 加西亚·马尔克斯 爱情 文学 ','发布'),(15,6,'The Kite Runner','追风筝的人','','0000-00-00 00:00:00',X'','','[美] 卡勒德·胡赛','李继宏 ','9787208061644',29.0,362,'',0,NULL,10,'http://img3.douban.com/mpic/s1727290.jpg',1,'平装','上海人民出版社','卡勒德·胡赛尼（Khaled Hosseini），1965年生于阿富汗喀布尔市，后随父亲迁往美国。胡赛尼毕业于加州大学圣地亚哥医学系，现居加州。“立志拂去蒙在阿富汗普通民众面孔的尘灰，将背后灵魂的悸动展示给世人。”著有小说《追风筝的人》(The Kite Runner，2003）、《灿烂千阳》(A Thousand Splendid Suns，2007)、《群山回唱》（And the Mountains Echoed,2013）。作品全球销量超过4000万册。2006年，因其作品巨大的国际影响力，胡赛尼获','12岁的阿富汗富家少爷阿米尔与仆人哈桑情同手足。然而，在一场风筝比赛后，发生了一件悲惨不堪的事，阿米尔为自己的懦弱感到自责和痛苦，逼走了哈桑，不久，自己也跟随父亲逃往美国。成年后的阿米尔始终无法原谅自己当年对哈桑的背叛。为了赎罪，阿米尔再度踏上暌违二十多年的故乡，希望能为不幸的好友尽最后一点心力，却发现一个惊天谎言，儿时的噩梦再度重演，阿米尔该如何抉择？故事如此残忍而又美丽，作者以温暖细腻的笔法勾勒人性的本质与救赎，读来令人荡气回肠。','追风筝的人 阿富汗 小说 人性 救赎 卡勒德·胡赛尼 外国文学 外国小说 ','发布'),(16,6,'','围城','','0000-00-00 00:00:00',X'','','钱钟书 ','','9787020024759',19.0,359,'',0,NULL,9,'http://img3.douban.com/mpic/s1070222.jpg',1,'平装','人民文学出版社','钱钟书(1910－1998)，字哲良，默存，号槐聚，中国江苏无锡人，中国近代著名作家、 文学研究家。毕业于清华大学外文系，获文学学士，赴上海，到光华大学任教。后考取第三届(1935年)庚子赔款公费留学资格，名列榜首，留学英国牛津大学 埃克塞特学院。大学毕业后任教于多所高校。新中国成立后被评为一级教授。晚年就职于中国社会科学院，任副院长。其夫人杨绛也是著名作家，育有一女钱媛(1937年-1997年)。曾为《毛泽东选集》英文版翻译小组成员。1998年逝世，享年88岁。','《围城》是钱钟书所著的长篇小说。第一版于1947年由上海晨光出版公司出版。1949年之后，由于政治等方面的原因，本书长期无法在中国大陆和台湾重印，仅在香港出现过盗印本。1980年由作者重新修订之后，在中国大陆地区由人民文学出版社刊印。此后作者又曾小幅修改过几次。《围城》自从出版以来，就受到许多人的推重。由于1949年后长期无法重印，这本书逐渐淡出人们的视野。1960年代，旅美汉学家夏志清在《中国现代小说史》(A History of Modern Chinese Fiction)中对本书作出很高的评价，这','钱钟书 围城 小说 中国文学 经典 婚姻 现代文学 文学 ','发布'),(17,3,'','平如美棠','','0000-00-00 00:00:00',X'','','饶平如 ','','9787549535644',39.8,360,'',0,NULL,9,'http://img5.douban.com/mpic/s26835759.jpg',1,'平装','广西师范大学出版社','87岁时，饶老先生患有老年痴呆症的妻子美棠去世。那之后有半年时间，他无以排遣，每日睡前醒后，都是难过，只好去他俩曾经去过的地方、结婚的地方，到处坐坐看看，聊以安慰。后来终于决定画下他俩的故事，他觉得死是没有办法的事，但画下来的时候，人还能存在。于是，他一笔一笔，从美棠童年画起……就这样亲手构建和存留下了的一个普通中国家庭的记忆，也记录下了中国人最美、最好的精神世界。','这是饶平如一生的故事。他不是一个想打仗的人，但他还是义无反顾去打仗了。又因为和美棠在一起，他最终厌倦了战争，想要回家。六十年的相守历尽坎坷，命运让他们长久分离。好容易最后又在一起了，美棠却身患重病且渐渐失去记忆。平如推掉了所有工作，全身心照顾妻子。每天5点起床，给她梳头、洗脸、烧饭、做腹部透析，每天4次，消毒、口罩、接管、接倒腹水、还要打胰岛素、做纪录，他不放心别人帮。美棠在病痛中渐渐不再配合，不时动手拔身上的管子。耳朵不好，看字也不清楚了，平如就画这画劝她不要拉管子，但画也不管用，只能晚上不睡一整夜看着','爱情 平如美棠 人生 绘本 饶平如 生活 我俩的故事 画册 ','发布'),(18,6,'Gone with the Wind','飘（上下）','','0000-00-00 00:00:00',X'','','[美国] 玛格丽特·','李美华 ','9787806570920',40.0,1235,'',0,NULL,10,'http://img5.douban.com/mpic/s1078958.jpg',1,'精装','译林出版社','米切尔（Margaret Mitchell, 1900-1949）美国女作家。出生于美国南部佐治亚州亚特兰大市。父亲是个律师，曾任亚特兰大历史协会主席。米切尔曾就读于华盛顿神学院、马萨诸塞州的史密斯学院。其后，她曾担任地方报纸《亚特兰大报》的记者。1925年与约翰·马尔什结婚，婚后辞去报职，潜心写作。米切尔一生中只发表了《飘》这部长篇巨著。她从1926年开始着力创作《飘》，10 年之后，作品问世，一出版就引起了强烈的反响。由于家庭的熏陶，米切尔对美国历史，特别是南北战争时期美国南方的历史产生了浓厚的兴趣。','小说中的故事发生在1861年美国南北战争前夕。生活在南方的少女郝思嘉从小深受南方文化传统的熏陶，可在她的血液里却流淌着野性的叛逆因素。随着战火的蔓廷和生活环境的恶化，郝思嘉的叛逆个性越来越丰满，越鲜明，在一系列的的挫折中她改造了自我，改变了个人甚至整个家族的命运，成为时代时势造就的新女性的形象。作品在描绘人物生活与爱情的同时，勾勒出南北双方在政治，经济，文化各个层次的异同，具有浓厚的史诗风格，堪称美国历史转折时期的真实写照，同时也成为历久不衰的爱情经典。','飘 外国文学 经典 爱情 小说 美国 外国名著 名著 ','发布'),(19,0,'西方文学：心灵的历史','西方文学之旅&lt;script&gt;alert(1);&lt;/script','','0000-00-00 00:00:00',X'','','徐葆耕 ','','9787543450462',79.0,653,'',0,NULL,10,'http://img5.douban.com/mpic/s1031217.jpg',1,'平装','河北教育出版社','徐葆耕清华大学中文系主任，教授。主要作品有：《西方文学：心灵的历史》、《释古与清华学派》、《紫色清华》。影视创作有：电影剧本《邻居》（合作）、《普通人家》、《孤帆远影》等。','《西方文学之旅(上下卷)》中有最佳体现。它不是传统意义上的教材，却作为文学欣赏和文学史知识的经典，在清华、北大、武大等全国诸多重点高校学生中风靡流传十余年。此交出版的插图本，更展现了西方文学与艺术的有机结合，阅读、收藏、欣赏思想的完美的统一，构造了可以尽情遨游的多重审美空间。文学，是人类心灵的历史。西方的一些真诚的心灵探险家们，以西西弗斯推石上山的胆略和毅力，在宇宙浩瀚深邃的内心世界里摸索，顽地向着它的神秘底蕴掘进。他们是情感的受难者，几乎没有一种痛苦与欢欣不被他们品味过，表现过。流动不已的生命现象和变幻','西方文学 文学史 徐葆耕 文学 外国文学 文艺理论 文学理论 文学评论 ','发布'),(20,1,'历史的回顾','徐向前回忆录','','0000-00-00 00:00:00',X'','','徐向前 ','','9787506554213',56.0,646,'',0,NULL,10,'http://img5.douban.com/mpic/s5773119.jpg',1,'平装','解放军出版社','徐向前(1901～1990)  原名徐象谦，字子敬。山西五台永安村人。黄埔军校第一期毕业。曾在国民军第二军第六混成旅任教导营教官、参谋、团副。1927年在武汉中央军事政治学校任队长，同年加入中国共产党。广州起义中任工人赤卫队第六联队长。土地革命战争时期，历任工农革命军第四师第十团党代表，师参谋长、，师长，中国工农红军第三十一师副师长，红一军副军长兼第一师师长。1931年起历任红四军参谋长，红四军军长，红四方面军总指挥，红军右路军总指挥，西路军军政委员会副主席。参加了长征。抗日战争时期，任八路军第一二九师副','中国人民解放军高级将领回忆录丛书：徐向前回忆录。我的青年时期，中国正处在急风暴雨的革命斗争年代。新与旧，革命与反动，光明与黑暗，两种势力激烈搏斗着。俄国十月革命的影响，中国无产阶级和人民大众的英勇斗争，中国共产党反帝反封建的鲜明旗帜和实现共产主义的伟大纲领，引导我走上了共产主义的道路。戎马大半生，幸存至今。我的经历是同我们的党，我们的军队，我们的人民的奋斗历史，联结在一起的。我们党半个多世纪以来的历程是光辉的，也是艰难曲折的。创业维艰。共产主义是人类历史上亘古未有的崭新事业。中国革命的每一步胜利，都付出了','回忆录 传记 徐向前 历史 元帅 军事 中共党史 想读《徐向前回忆录》 ','发布'),(21,1,'历史对谈  德川家康','德川家康决胜录','','0000-00-00 00:00:00',X'','','(日)山冈庄八 (日','胡毅美 ','9787544256667',28.0,221,'',0,NULL,10,'http://img3.douban.com/mpic/s11156474.jpg',1,'平装','南海出版公司','山冈庄八（1907-1978）日本著名历史小说家，本名藤野庄藏，著有《德川家康》、《织田信长》、《丰臣秀吉》、《伊达政宗》等桑田忠亲（1902-1987）日本著名历史学家。著有《日本茶道史》、《日本武将列传》、《日本合战全集》等。','《德川家康决胜录》内容简介：三百年来，日本民间一直流传一个故事：“杜鹃不鸣，怎么办？”织田信长的办法是“杀之”，丰臣秀吉为“诱之”，德川家康则是：“等待。”作为桶狭间大败一方的小角色，德川家康败后却极力向织田信长展示军威；面对“战神”武田信玄，明知有生死之虞，他却以“哀兵”倾巢出击；小牧之战，分明已将丰臣秀吉逼入死角，他却乘胜收兵；两战大阪，他坐拥天下合力，仗却打得窝囊透顶……德川家康侧室众多，但始终后院稳定，女人们关系和睦；他儿孙广布全国，但始终同心同德，从无萧墙之忧；羸弱不堪的三河军团，不但被他改造成','德川家康 日本战国 山冈庄八 日本文学 新经典文库 日本 兵法 其他书籍 ','发布'),(22,2,'','民主的细节','','0000-00-00 00:00:00',X'','','刘瑜 ','','9787542629586',25.0,293,'',0,NULL,10,'http://img5.douban.com/mpic/s4146437.jpg',1,'平装','上海三联书店','刘瑜，哥伦比亚大学政治学博士，哈佛大学博士后，剑桥大学讲师。现任教于清华大学政治系，担任副教授。','这本书是作者过去几年给一些期刊报纸写的专栏文章结集，其中主要是给《南方人物周刊》的文章。全书中以讲故事的形式，把“美国的民主”这样一个概念性的东西拆解成点点滴滴的事件、政策和人物去描述。','刘瑜 民主 政治 美国 随笔 社会学 政治学 社会 ','发布'),(23,4,'','诛仙4','','0000-00-00 00:00:00',X'','','萧鼎 ','','9787505413214',22.0,252,'',0,NULL,10,'http://img5.douban.com/mpic/s1433218.jpg',1,'平装','朝华出版社','萧鼎，男，福建人。特立独行，寄情写作。长篇奇幻系列小说《诛仙》在台湾一经出版，即飙升至港台畅销书冠军榜，以其天马行空的想像、雄健恢宏的叙事迅速成为华语奇幻文学巅峰之作，扬名海外。网络点击数超过三千万人次，被誉为可媲美还珠楼主《蜀山剑侠传》的国内新一代有浓郁中国风骨的奇幻精品巨著。','历尽千辛万苦之后，鬼厉终于在南疆找到了可以救治碧瑶的大巫师，然而天不从人愿，在紧要关头，大巫师因伤重而逝。鬼厉悲痛万分，日日借酒浇愁。而在南疆十万大山之中，兽妖的复活给世人带来了一场前所未有的灾难。百姓纷纷北逃，先是南疆被荡平，紧接着魔教也在一场阴谋中所剩无几，只留鬼王宗一派。风云暗涌，在正道看似紧密的联盟之中也蕴含了种种危机，鬼厉的命运会怎样呢？正道门派又将如何阻止这场灾难的来临呢？','玄幻 诛仙 萧鼎 小说 武侠 奇幻 网络小说 中国 ','发布'),(24,4,'','浮沉之主','','0000-00-00 00:00:00',X'','','黄易 ','','9787801421517',8.8,136,'',0,NULL,10,'http://img3.douban.com/mpic/s2635922.jpg',1,'平装','华艺出版社','','本书前言阔不可度、深不可测的海洋是充满未知事物的另一个宇宙。凌渡宇要深入一万公尺海底找寻可能改变整个人类能源史的物质。航程中在戒备敌人的武器之余还要小心一股杀人灭口的神秘力量。他的敌人除了“恐怖大王”枭风外，在波涛汹汹里还藏了难以抵抗的大敌。特色及评论文章节选','黄易 玄幻 小说 玄幻小说 高中时光 魔幻&奇幻&科幻&玄幻 香港 电子版 ','发布'),(25,4,'','诛仙7','','0000-00-00 00:00:00',X'','','萧鼎 ','','9787806738580',22.0,244,'',0,NULL,10,'http://img3.douban.com/mpic/s2007461.jpg',1,'平装','花山文艺出版社','萧鼎，男，福建人。特立独行，寄情写作。长篇奇幻系列小说《诛仙》在台湾一经出版，即飙升至港台畅销书冠军榜，以其天马行空的想像、雄健恢宏的叙事迅速成为华语奇幻文学巅峰之作，扬名海外。网络点击数超过三千万人次，被誉为可媲美还珠楼主《蜀山剑侠传》的国内新一代有浓郁中国风骨的奇幻精品巨著。','兽神陨灭、鬼厉火并鬼王、九尾天狐月夜现真身、陆雪琪奉令弑师、四灵血阵图霸天下、张小凡草庙村故地寻根……只有远离熙熙攘攘的人世，也许才能有清静的所在。狐岐山中，恍惚间碧瑶竟似活了过来，或许是鬼厉思念太过而产生幻觉？或许是合欢铃有不为人知的更为强大的法力？面对昏迷不醒的碧瑶和越来越深情的雪琪，甚至面对他自己，鬼厉都感到人生也如同陌生之地的岔路一样迷惘，不知所终。','玄幻 诛仙 萧鼎 小说 武侠 网络小说 奇幻 中国 ','草稿'),(28,6,'','用地图看懂世界经济','','0000-00-00 00:00:00',X'','','生命科学编辑团队 ','何月华 ','9787510065545',32.0,224,'',0,NULL,10,'http://img5.douban.com/mpic/s27222517.jpg',1,'平装','世界图书出版公司·后浪出版公司','生命科学编辑团队（Life Science），灵活运用广大的网络，收集国内外的各种资讯，以独特切入点规划制作书籍的编辑团队。其辛辣观点广受好评，从日常生活的实用信息，到经济、地理、历史等文化杂学，探讨的领域相当广泛。何月华，辅仁大学翻译学研究所中日口笔译硕士，历任电视台国际新闻资深编译，目前从事口笔译执业与教学。','通过近百张地图，轻松看懂通货膨胀、股价涨跌、黄金保值、能源价格、福利政策等70个与生活息息相关的关键经济问题日本专业团队倾力打造世界经济的趣味和重点尽收地图，不懂理论也能轻松理解经济问题日本、台湾最畅销经济通俗读物「内容简介」你还在为铺天盖地的财经信息而 困扰吗？它们夹杂着大量术语以至于难以理解，或者看起来与自己无关而不必关注。你可能需要一本帮助你看懂这些信息的通俗读物。《用地图看懂世界经济》就是这样一本内容丰富、轻松易读、兴味盎然的小书。它采用短文加地图的形式，通过近一百张地图，将通货膨胀、股价涨跌、黄','经济 经济学 地图 后浪 科普 ***后浪*** 新书 无电子书 ','发布');
/*!40000 ALTER TABLE `tb_book` ENABLE KEYS */;

#
# Structure for table "tb_bookcat"
#

DROP TABLE IF EXISTS `tb_bookcat`;
CREATE TABLE `tb_bookcat` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '分类名称',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级分类',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Data for table "tb_bookcat"
#

INSERT INTO `tb_bookcat` VALUES (1,'历史',0),(2,'政治',0),(3,'言情',0),(4,'玄幻',0),(5,'都市言情',3),(6,'小说',0);

#
# Structure for table "tb_bookshop"
#

DROP TABLE IF EXISTS `tb_bookshop`;
CREATE TABLE `tb_bookshop` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `regtime` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "tb_bookshop"
#

/*!40000 ALTER TABLE `tb_bookshop` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_bookshop` ENABLE KEYS */;

#
# Structure for table "tb_comment"
#

DROP TABLE IF EXISTS `tb_comment`;
CREATE TABLE `tb_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `bid` int(11) NOT NULL DEFAULT '0' COMMENT '书籍外键',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户外键',
  `comtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '评论日期',
  `comcontent` varchar(100) NOT NULL DEFAULT '' COMMENT '评论内容',
  `comflag` int(10) NOT NULL DEFAULT '0' COMMENT '评论标志',
  PRIMARY KEY (`id`),
  KEY `FK_TB_COMME_REFERENCE_TB_BOOKI` (`bid`),
  KEY `FK_TB_COMME_REFERENCE_TB_CUSTO` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

#
# Data for table "tb_comment"
#


#
# Structure for table "tb_manager"
#

DROP TABLE IF EXISTS `tb_manager`;
CREATE TABLE `tb_manager` (
  `AdminId` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `AdminName` varchar(10) NOT NULL DEFAULT '' COMMENT '名称',
  `AdminPwd` varchar(20) NOT NULL DEFAULT '' COMMENT '密码',
  `AdminFlag` int(11) NOT NULL DEFAULT '0' COMMENT '标志',
  PRIMARY KEY (`AdminId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "tb_manager"
#

INSERT INTO `tb_manager` VALUES (1,'admin','admin',1);

#
# Structure for table "tb_order"
#

DROP TABLE IF EXISTS `tb_order`;
CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(11) DEFAULT NULL COMMENT '用户ID',
  `books` varchar(255) DEFAULT NULL COMMENT '订单内容',
  `ordertime` datetime DEFAULT NULL COMMENT '下单时间',
  `state` int(11) DEFAULT NULL COMMENT '0表示未支付，1表示支付',
  `tel` varchar(20) DEFAULT NULL COMMENT '电话',
  `location` varchar(50) DEFAULT NULL COMMENT '地址',
  `username` varchar(20) DEFAULT NULL COMMENT '用户名',
  `confirmtime` datetime DEFAULT NULL COMMENT '确认时间',
  `admin` smallint(6) DEFAULT '0' COMMENT '0 默认 后台未处理，1表示已受理',
  `sendtime` datetime DEFAULT NULL COMMENT '发货时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unorder` (`uid`,`books`,`state`,`confirmtime`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

#
# Data for table "tb_order"
#


#
# Structure for table "tb_post"
#

DROP TABLE IF EXISTS `tb_post`;
CREATE TABLE `tb_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `username` varchar(255) DEFAULT NULL COMMENT '留言者姓名',
  `email` varchar(255) DEFAULT NULL COMMENT '邮件',
  `phone` varchar(255) DEFAULT NULL COMMENT '电话',
  `company` varchar(255) DEFAULT NULL COMMENT '公司',
  `content` varchar(1024) DEFAULT NULL COMMENT '留言内容',
  `posttime` datetime DEFAULT NULL COMMENT '留言日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='网住离线留言表';

#
# Data for table "tb_post"
#

/*!40000 ALTER TABLE `tb_post` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_post` ENABLE KEYS */;

#
# Structure for table "tb_pub"
#

DROP TABLE IF EXISTS `tb_pub`;
CREATE TABLE `tb_pub` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `content` blob COMMENT '内容',
  `pubtime` datetime DEFAULT NULL COMMENT '发布日期',
  `state` int(11) DEFAULT '0' COMMENT '0草稿 1 发布',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "tb_pub"
#

/*!40000 ALTER TABLE `tb_pub` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_pub` ENABLE KEYS */;

#
# Structure for table "tb_user"
#

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `truename` varchar(30) DEFAULT NULL COMMENT '真实姓名',
  `sex` varchar(2) DEFAULT NULL COMMENT '性别',
  `tel` varchar(30) NOT NULL DEFAULT '' COMMENT '电话',
  `email` varchar(30) NOT NULL DEFAULT '' COMMENT '邮件',
  `addr` varchar(40) NOT NULL DEFAULT '' COMMENT '地址',
  `regtime` date NOT NULL DEFAULT '0000-00-00' COMMENT '注册时间',
  `ques` varchar(200) DEFAULT NULL COMMENT '问题',
  `answer` varchar(200) DEFAULT NULL COMMENT '答案',
  `logtime` int(11) DEFAULT '0' COMMENT '登录次数',
  `lastlogtime` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '上次登录时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sdf` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

#
# Data for table "tb_user"
#

INSERT INTO `tb_user` VALUES (4,'admin','39905514d4a0ab49278c8c4bb2e13f18','\\&quot;&gt;&lt;script&gt;alert',NULL,'\\&quot;&gt;&lt;script&gt;alert','\\&quot;&gt;&lt;script&gt;alert','\\&quot;&gt;&lt;script&gt;alert(1); &lt;/','2014-04-03','www33','123',8,'2014-04-24 14:50:46');
