USE appDB;

-- Carregando a tabela de estados

INSERT INTO estado(descricao, uf) VALUES('Acre', 'AC');
INSERT INTO estado(descricao, uf) VALUES('Alagoas', 'AL');
INSERT INTO estado(descricao, uf) VALUES('Amapá', 'AP');
INSERT INTO estado(descricao, uf) VALUES('Amazonas', 'AM');
INSERT INTO estado(descricao, uf) VALUES('Bahia', 'BA');
INSERT INTO estado(descricao, uf) VALUES('Ceará', 'CE');
INSERT INTO estado(descricao, uf) VALUES('Distrito Federal', 'DF');
INSERT INTO estado(descricao, uf) VALUES('Espírito Santo', 'ES');
INSERT INTO estado(descricao, uf) VALUES('Goiás', 'GO');
INSERT INTO estado(descricao, uf) VALUES('Maranhão', 'MA');
INSERT INTO estado(descricao, uf) VALUES('Mato Grosso', 'MT');
INSERT INTO estado(descricao, uf) VALUES('Mato Grosso do Sul', 'MS');
INSERT INTO estado(descricao, uf) VALUES('Minas Gerais', 'MG');
INSERT INTO estado(descricao, uf) VALUES('Pará', 'PA');
INSERT INTO estado(descricao, uf) VALUES('Paraíba', 'PB');
INSERT INTO estado(descricao, uf) VALUES('Paraná', 'PR');
INSERT INTO estado(descricao, uf) VALUES('Pernambuco', 'PE');
INSERT INTO estado(descricao, uf) VALUES('Piauí', 'PI');
INSERT INTO estado(descricao, uf) VALUES('Rio de Janeiro', 'RJ');
INSERT INTO estado(descricao, uf) VALUES('Rio Grande do Norte', 'RN');
INSERT INTO estado(descricao, uf) VALUES('Rio Grande do Sul', 'RS');
INSERT INTO estado(descricao, uf) VALUES('Rondônia', 'RO');
INSERT INTO estado(descricao, uf) VALUES('Roraima', 'RR');
INSERT INTO estado(descricao, uf) VALUES('Santa Catarina', 'SC');
INSERT INTO estado(descricao, uf) VALUES('São Paulo', 'SP');
INSERT INTO estado(descricao, uf) VALUES('Sergipe', 'SE');
INSERT INTO estado(descricao, uf) VALUES('Tocantins', 'TO');

-- Carregando a tabela de tipos de usuarios
INSERT INTO tipo_usuario(descricao) VALUES ('Administrador');
INSERT INTO tipo_usuario(descricao) VALUES ('Funcionário');
INSERT INTO tipo_usuario(descricao) VALUES ('Cliente');

-- Carregando a tabela de usuarios

INSERT INTO usuario(login, senha, nome, email, nascimento, endereco, numero, complemento, bairro, cidade, id_estado, cep, telefone, id_tipo)
		 VALUES('admin',
                        'admin',
						'Administrador do site',
						'adm@php.com',
						'2002-11-08',
						'Rua Souza Nunes',
						'12',
						'',
						'Centro',
						'Rio de Janeiro',
						19,
						'32232222',
						'2122343333',
						1);

-- Carregando a tabela de produtos

INSERT INTO produto(titulo, descricao, imagem, preco, estoque) VALUES('Python: Guia prático do básico ao avançado (Cientista de dados Livro 2',
     'Este e-book traz uma apresentação, do básico ao avançado, de uma das mais poderosas e simples linguagem de programação. 
     Iremos conhecer e aprender a dominar todos os principais elementos para que possamos desenvolver nossos projetos e pôr 
     nossas ideias para o mundo dos negócios digitais utilizando Python.',
     'imagens/produtos/python-001.jpg',
     5.99,
     20);
     
INSERT INTO produto(titulo, descricao, imagem, preco, estoque) VALUES('Arquitetura Limpa: O Guia do Artesão Para Estrutura e Design de Software',
     'Arquitetura Limpa é uma leitura essencial para profissionais que já atuam ou querem ingressar no mercado, como arquitetos de software, 
     analistas de sistemas, designers de sistemas, gerentes de software e programadores que precisam executar designs de outras pessoas.',
     'imagens/produtos/arqui-001.jpg',
     59.60,
     15);     
     
     