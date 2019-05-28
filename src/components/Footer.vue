<template>

<footer id="footer">
    <div class="container-fluid" id="cont-footer">
        <div class="row">
            <div class="col-4 ksl">
                <span>Keslène DENIS, 2019</span>
                <br>
                <span>07.05.20.30.40</span>
            </div>
            <div class="col-4">
                <span>
                    <i class="fab fa-instagram ic-footer"></i>
                </span>
                <span>
                    <i class="fab fa-facebook-square ic-footer"></i>
                </span>
            </div>
            <div class="col-4">
                <span id="jdsd"> 
                    Développé par <a href="https://www.jdsd.fr/">Jonathan DOS SANTOS DAMIAO</a>
                </span>
            </div>
        </div>
    </div>
</footer>

</template>

<script>
export default {
    name: 'Footer'
}
</script>

<style>

#footer {
    position: absolute; 
    left: 0;
    bottom: 0;
    width: 100%;
/*     height: 110px; */
    background-color: black;
    text-align: center;
}

#cont-footer {
    padding-top:    10px;
    padding-bottom: 5px;
}

.ic-footer{
    font-size: 1.6rem;
    margin-right: 10px;
}

#jdsd, .ksl span {
    font-size: .9rem;
}

#jdsd a:visited {
    color: #7F38A8;
}


.ic-footer, #jdsd, .ksl span {
    color: #C5A164;
}


</style>

