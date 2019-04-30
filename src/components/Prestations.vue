<template>
    <div>
        <PrestationsMenu></PrestationsMenu>
        <PrestationsItems></PrestationsItems>
    </div>
</template>

<script>
import PrestationsMenu from '@/components/PrestationsMenu'
import PrestationsItems from '@/components/PrestationsItems'
import prestations from '@/assets/prestations.json'
export default {
    name: 'Prestations',
    components: {
        PrestationsMenu,
        PrestationsItems
    }
}
</script>

<style>

</style>
