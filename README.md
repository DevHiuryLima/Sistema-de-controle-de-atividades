# Sistema de controle de atividades
 
Desafio
Implementar uma tela de controle de atividades utilizando PHP e MariaDB (MySQL).
A tela deve atender os seguintes requisitos:
 Possibilidade de adicionar novas atividades contendo um título, descrição e tipo;
 Listar as atividades em aberto;
 Marcar e desmarcar as atividades como concluídas;
 Listar as atividades concluídas;
 Editar o título, descrição e tipo de uma atividade;
 Remover uma atividade.

Regras de negócio
 Os tipos de atividades podem ser: Desenvolvimento, Atendimento, Manutenção e Manutenção urgente;
 Atividades de manutenção urgente não podem ser removidas, apenas finalizadas;
 Atividades de atendimento e manutenção urgentes não podem ser finalizadas se a descrição estiver preenchida com menos de 50 caracteres;
 Manutenções urgentes não podem ser criadas (nem via edição) após as 13:00 das sextas-feiras.

Requisitos Funcionais
O sistema deve estar protegido por um login
Todas as telas do sistema só poderão ser acessadas por usuários que estejam logados

Requisitos Não Funcionais
O sistema deve armazenar em banco de dados, de forma segura, a senha de acesso dos usuários.