# Sistema de controle de atividades
 
##### Desafio  
<p>Implementar uma tela de controle de atividades utilizando PHP e MariaDB (MySQL).<br>
A tela deve atender os seguintes requisitos: <br>
 Possibilidade de adicionar novas atividades contendo um título, descrição e tipo;<br>
 Listar as atividades em aberto;<br>
 Marcar e desmarcar as atividades como concluídas;<br>
 Listar as atividades concluídas;<br>
 Editar o título, descrição e tipo de uma atividade;<br>
 Remover uma atividade.<br>
</p><br>

<p>Regras de negócio</p>
<p> Os tipos de atividades podem ser: Desenvolvimento, Atendimento, Manutenção e Manutenção urgente;<br>
 Atividades de manutenção urgente não podem ser removidas, apenas finalizadas;<br>
 Atividades de atendimento e manutenção urgentes não podem ser finalizadas se a descrição estiver preenchida com menos de 50 caracteres;<br>
 Manutenções urgentes não podem ser criadas (nem via edição) após as 13:00 das sextas-feiras.<br>
</p><br>

<p>Requisitos Funcionais</p>
<p>O sistema deve estar protegido por um login<p><br>
<p>Todas as telas do sistema só poderão ser acessadas por usuários que estejam logados</p><br>

<p>Requisitos Não Funcionais</p>
<p>O sistema deve armazenar em banco de dados, de forma segura, a senha de acesso dos usuários.</p><br>