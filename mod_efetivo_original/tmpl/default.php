<?php 
// No direct access
defined('_JEXEC') or die; ?>

<?php
$context = stream_context_create(array('http' => array('header'=>'Connection: close\r\n')));

//webservice que será consumido para popular a tabela
$url = file_get_contents('http://localhost/webservice/Efetivo',false,$context);

// Descodificando a string json e jogando em um array 
$json = json_decode($url);
?>
//Configurações para o imagem
<div class="custom<?php //echo $moduleclass_sfx ?>" <?php if ($params->get('backgroundimage')) : ?> style="background-image:url(<?php echo $params->get('backgroundimage');?>)"<?php endif;?> >
//Início da tabela    
<table class="table table-responsive">
        <thead>
        <tr>
            <th>Posto/Grad</th>
            <th>Nome</th>
            <th>Seção</th>
            <th>Ramal</th>
            <th>RTCAER</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
//Populando a tabela
        <?php foreach($json as $item):?>
//Chamando funções JS para mostrar a foto quando o cursor estiver sobre a tr(linha)(show) e ocultando a imagem quando o cursor sair da tr(linha)(hide), você pode colocar para aparecer a imagem outro elemento específico também, basta copiar a chamada das funções no elemente desejado.
            <tr onmouseover="tooltip.show('<img class=\'limita_imagem\' src=\'/fotos/<?=$item->post_grad_nome.'_'.$item->nome_guerra?>.jpg\'/>');" onmouseout="tooltip.hide();">
                <td><?=$item->post_grad_nome?>  <?=$item->especialidade_nome?> <?php if($item->situacao == 2) echo "R/1";?> <?php if($item->situacao == 3) echo "Refm";?></td>
		<td><?=$item->nome_completo ?></td>
                <td><?=$item->secao_nome?></td>
                <td><?=$item->ramal?></td>
                <td style="color: red"><?=$item->rtcaer?></td>
                <td><?=$item->email?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
// JavaScript Document
//Funções da imagem
var tooltip=function(){
    var id = 'tt';
    var top = -50;
    var left = 10;
    var maxw = 300;
    var speed = 10;
    var timer = 20;
    var endalpha = 95;
    var alpha = 0;
    var tt,t,c,b,h;
    var ie = document.all ? true : false;
    return{
        show:function(v,w){
            if(tt == null){
                tt = document.createElement('div');
                tt.setAttribute('id',id);
                t = document.createElement('div');
                t.setAttribute('id',id + 'top');
                c = document.createElement('div');
                c.setAttribute('id',id + 'cont');
                b = document.createElement('div');
                b.setAttribute('id',id + 'bot');
                tt.appendChild(t);
                tt.appendChild(c);
                tt.appendChild(b);
                document.body.appendChild(tt);
                tt.style.opacity = 0;
                tt.style.filter = 'alpha(opacity=0)';
                document.onmousemove = this.pos;
            }
            tt.style.display = 'block';
            c.innerHTML = v;
            tt.style.width = w ? w + 'px' : 'auto';
            if(!w && ie){
                t.style.display = 'none';
                b.style.display = 'none';
                tt.style.width = tt.offsetWidth;
                t.style.display = 'block';
                b.style.display = 'block';
            }
            if(tt.offsetWidth > maxw){tt.style.width = maxw + 'px'}
            h = parseInt(tt.offsetHeight) + top;
            clearInterval(tt.timer);
            tt.timer = setInterval(function(){tooltip.fade(1)},timer);
        },
        pos:function(e){
            var u = ie ? event.clientY + document.documentElement.scrollTop : e.pageY;
            var l = ie ? event.clientX + document.documentElement.scrollLeft : e.pageX;
            tt.style.top = (u - h) + 'px';
            tt.style.left = (l + left) + 'px';
        },
        fade:function(d){
            var a = alpha;
            if((a != endalpha && d == 1) || (a != 0 && d == -1)){
                var i = speed;
                if(endalpha - a < speed && d == 1){
                    i = endalpha - a;
                }else if(alpha < speed && d == -1){
                    i = a;
                }
                alpha = a + (i * d);
                tt.style.opacity = alpha * .01;
                tt.style.filter = 'alpha(opacity=' + alpha + ')';
            }else{
                clearInterval(tt.timer);
                if(d == -1){tt.style.display = 'none'}
            }
        },
        hide:function(){
            clearInterval(tt.timer);
            tt.timer = setInterval(function(){tooltip.fade(-1)},timer);
        }
    };
}();

</script>
