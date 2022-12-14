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
	
	insert into funcionario(nome,telefone,cpf,qualificacao,experiencia,cep,numerocasa,complemento)VALUES
	('João da Silva','(21)99869-4581','123456789-12','lanterneiro',
	'3 anos', '26551-090',100,'casa'),
	('Pedro Santos','(21)99911-2222','123456789-13','mecânico',
	'10 anos', '23085-610',31,'fundos');
	
	
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
	
	1) Pesquisar os dados de todos os clientes.
	
	select * from cliente;
	
	2) Pesquisar nome e telefone de todos os clientes.
	
	select nome,telefone from cliente;
	
	3) Pesquisar placa,marca e modelo de todos os veículos da cor preta.
	
	select placa,marca,modelo from veiculo where cor = 'preto';
	
	4)Pesquisar placa,marca e modelo de todos os veículos que tenham qualquer
	variação da cor preta.
	
	select placa,marca,modelo from veiculo where cor like '%preto%';
	
	Editar os dados dos clientes de cpf 123456789-10 e 123456789-11 e 123444555-11 para acrescentar o sobrenome.
	
	update cliente set nome = 'Maria Jariele de Brito' where 
	cpf = '123456789-10';
	
	update cliente set nome = 'João da Silva Souza' where 
	cpf = '123444555-11';
	
	update cliente set nome = 'Rafaella Rodrigues da Silva' where 
	cpf = '123456789-11';
	
	5)Pesquisar nome e telefone de todos os clientes que o nome comece com M.

	select nome,telefone from cliente where nome like 'm%';		
	
	6)Pesquisar o nome e telefone de todos os clientes que o último sobrenome seja Silva.
	
	select nome,telefone from cliente where nome like '%Silva';
	
	7)Pesquisar ordem de serviço, placa e defeito apresentados pelos carros que deram entrada na oficina entre os dias 01/12/2022 e 07/12/2022.
	
	select ordemservico,placa,defeito from servico
	WHERE
	dataentrada >= '2022-12-01' AND
	dataentrada <= '2022-12-07';
	
	select ordemservico,placa,defeito from servico
	WHERE
	dataentrada BETWEEN '2022-12-01' AND '2022-12-07';
	
	8)Pesquisar ordem de serviço, placa do veículo, defeito dos veículos que 
	deram entrada na oficina nos dias 05 e 07 de dexenbro.
	
	select ordemservico,placa,defeito
	from servico
	where dataentrada in('2022-12-05','2022-12-07');
	
	9)Mostrar a soma da quantidade das peças da oficina.
	
	select sum(quantidade) from peca;
	
	10)Mostrar o valor total em mercadorias no estoque.
		
	select sum(quantidade * preco) from peca;
	
	/*Nomeado a coluna da pesquisa*/
	
	select sum(quantidade * preco) as 'Valor Total do Estoque' from peca;
	
	11)Calcular o valor médio das peças no estoque.
	
	select avg(preco) as 'Média de Preços' from peca;
	
	12)Mostrar a peça com menor preço do estoque.
	
	select min(preco) as 'Menor Preço' from peca;
	
	13)Mostrar a peça de maior preço no estoque.
	
	select max(preco) as 'Maior Preço' from peca;
	
	14)Mostrar nome, telefone e qualificação de todos os funcionários.
	
	select nome,telefone,qualificacao from funcionario;select nome,telefone,qualificacao from funcionario;
	
	
	15)Mostrar nome e telefone de todos os eletricistas.
	
	select nome,telefone from funcionario where qualificacao = 'eletricista';
	
	16) Mostrar nome e preço de todos os produtos da marca frasle.
	
	select nome,preco from peca where marca = 'frasle';
	
	17) Mostrar ordem de servico e preço pago de todos os serviços 
	que foram pagos a vista no dia 01/12/2022.
	
	select ordemservico,preco
	from servico
	where 
	formapagamento = 'a vista' and dataentrada = '2022-12-01';
	 
	18)Pesquisar nome,telefone,nome da rua, número da casa, bairro e cidade de 
	todos os clientes da oficina.
	
	select cliente.nome, cliente.telefone,endereco.rua,cliente.numerocasa,
	endereco.bairro,endereco.cidade
	from endereco inner join cliente
	on endereco.cep = cliente.cep;
	
	
	19)Pesquisar nome,telefone, placa e modelo do carro de todos os clientes.
	
	select cliente.nome,cliente.telefone,veiculo.placa,veiculo.modelo
	from cliente inner join veiculo
	on cliente.cpf = veiculo.cpf;

