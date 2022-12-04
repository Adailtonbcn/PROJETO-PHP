<h1>Listar usuários</h1>

<?php

    $sql = "SELECT * FROM usuarios";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if($qtd>0){
        print"<table class='table table-hover table-bordered'>";
        print "<tr>";          
        print "<th>Nome</th>";
        print "<th>Email</th>";
        print "<th>Data de Nacimento</th>";
        print "<th>Ações</th>";
        
        print "</tr>";
        while($row=$res->fetch_object()){
            print "<tr>";          
            print "<td>". $row->nome."</td>";
            print "<td>".$row->email."</td>";
            print "<td>". $row->data_nasc."</td>";
            print "<td>
                    <button onclick=\"location.href='?page=editar&id=".$row->id."';\" class='btn btn-success'>Editar</button>

                    <button onclick=\"if(confirm('tem certeza que deseja exluir?')){location.href='?page=salvar&acao=excluir&id=".$row->id."';}else{false;}\" class='btn btn-danger'>Excluir</button>
                    </td>";
            print "</tr>";
        }
        print"</table>";
    }

    else{
        print"<p class='alert-danger'>Não encontrou resultados</p>";
    }
?>