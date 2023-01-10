drop database if exists oficina;

create database oficina character set utf8 collate utf8_general_ci;

use oficina;

create table endereco(
	cep char(9) primary key,
	rua varchar(60)not null,
	bairro varchar(40)not null,
	cidade varchar(40)not null,
	uf char(2)not null);
	
create table cliente(
	cpf char(12) primary key,
	nome varchar(60)not null,
	telefone varchar(15)not null,
	cep char(9) not null,
	numerocasa integer not null,
	complemento varchar(30),
	foreign key(cep)references endereco(cep));
	
create table funcionario(
	matricula integer primary key auto_increment,
	nome varchar(60)not null,
	telefone varchar(15)not null,
	cpf char(12)not null,
	qualificacao varchar(30)not null,
	experiencia varchar(20)not null,
	cep char(9) not null,
	numerocasa integer not null,
	complemento varchar(30),
	usuario varchar(50)not null,
	senha varchar(255)not null,
	foreign key(cep)references endereco(cep));
	
	
	create table veiculo(
		placa char(7)primary key,
		marca varchar(20)not null,
		modelo varchar(20)not null,
		cor varchar(20)not null,
		ano char(4)not null,
		cpf char(12)not null,
		foreign key(cpf)references cliente(cpf));	
	
		
	create table servico(
		ordemservico integer primary key auto_increment,
		defeito varchar(100)not null,
		dataentrada date not null,
		datasaida date not null,
		preco double not null,
		garantia varchar(50)not null,
		formapagamento varchar(20)not null,
		placa char(7)not null,
		foreign key(placa)references veiculo(placa));	
		
		
	create table peca(
		codigopeca integer primary key auto_increment,
		nome varchar(60)not null,
		marca varchar(40) not null,
		modeloano varchar(250)not null,
		quantidade integer not null,
		preco double not null);		
		
		
	create table servicopeca(
		idservicopeca integer primary key auto_increment,
		quantidade integer not null,
		codigopeca integer not null,
		ordemservico integer not null,
		foreign key(codigopeca)references peca(codigopeca),
		foreign key(ordemservico)references servico(ordemservico));
		
		
		
	create table servicofunc(
		idservicofunc integer primary key auto_increment,
		descricao varchar(100)not null,
		ordemservico integer not null,
		matricula integer not null,
		foreign key(ordemservico)references servico(ordemservico),
		foreign key(matricula)references funcionario(matricula));
		
	
		
	
	insert into endereco(cep,rua,bairro,cidade,uf)VALUES
	('23085-610','Rua Padre Pauwels','Campo Grande','Rio de Janeiro','RJ'),
	('26551-090','Travessa Elpidio','Cruzeiro do Sul','Mesquita','RJ');

	insert into cliente(cpf,nome,telefone,cep,numerocasa,complemento)VALUES
	('123456789-10','Jariele','(21)99886-4587','23085-610',100,'apartamento 10'),
	('123456789-11','Rafaela','(21)99999-1122','23085-610',1020,'casa');
	
	insert into funcionario(nome,telefone,cpf,qualificacao,experiencia,cep,numerocasa,complemento,usuario,senha)VALUES
	('João da Silva','(21)99869-4581','123456789-12','lanterneiro',
	'3 anos', '26551-090',100,'casa','joao','123'),
	('Pedro Santos','(21)99911-2222','123456789-13','mecânico',
	'10 anos', '23085-610',31,'fundos','pedro','1234');
	
	
	insert into veiculo(placa,marca,modelo,cor,ano,cpf)VALUES
	('lsv3A86','citroen','c3','preto','2009','123456789-10'),
	('mmm1B55','Renault','Logan','prata','2015','123456789-11');
	
	
	insert into servico(defeito,dataentrada,datasaida,preco,garantia,formapagamento,placa) VALUES
	('barulho no freio','2022-12-01','2022-12-01',120,'3 meses','a vista','lsv3A86'),
	('suspensão batendo lado direito','2022-12-05','2022-12-06',450,'3 meses','cartão parcelado 3X','mmm1B55');
	
	insert into peca(nome,marca,modeloano,quantidade,preco)VALUES
	('pastilha de freio','frasle','citroen c3 e c4 - 2007,2008,2009,2010',30,
	170),
	('amortecedores dianteiros par','nakata','Renault Sandero,logan 2010/2011/2012',10,
	530);
	
	insert into servicopeca(quantidade,codigopeca,ordemservico)VALUES
	(1,1,1),(1,2,2);
		
		
	insert into servicofunc(descricao,ordemservico,matricula)VALUES
	('realizada troca das plastilhas',1,2),
	('realizada troca dos amortecedores',2,2);
	
