<template>
    <div class="row" id="cont-contact">
        <div class="col-md-7">
            <h2>Me contacter</h2>
            <div class="row">
                <div class="col-md-7">
                    <Carte></Carte>
                </div>
                <div class="col-md-5">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, itaque incidunt nihil deserunt, facere aliquid accusantium quo et magnam placeat ducimus eaque? Soluta voluptas sunt cumque placeat accusantium itaque. Accusantium!</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, itaque incidunt nihil deserunt, facere aliquid accusantium quo et magnam placeat ducimus eaque? Soluta voluptas sunt cumque placeat accusantium itaque. Accusantium!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, itaque incidunt nihil deserunt, facere aliquid accusantium quo et magnam placeat ducimus eaque? Soluta voluptas sunt cumque placeat accusantium itaque. Accusantium!</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, itaque incidunt nihil deserunt, facere aliquid accusantium quo et magnam placeat ducimus eaque? Soluta voluptas sunt cumque placeat accusantium itaque. Accusantium!</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, itaque incidunt nihil deserunt, facere aliquid accusantium quo et magnam placeat ducimus eaque? Soluta voluptas sunt cumque placeat accusantium itaque. Accusantium!</p>
                </div>
                <div class="col-md-5">
                    <img src="https://via.placeholder.com/500x300" id="img-salon">
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <h2>Formulaire de contact</h2>
            <FormContact></FormContact>
        </div>
    </div>
</template>

<script>
import Carte from '@/components/Contact/Carte'
import FormContact from '@/components/Contact/FormContact'

export default {
    name: 'Contact',
    components: {
        Carte, 
        FormContact
    }
}
</script>


<style>

#img-salon {
    max-width:100%;
}

</style>

