<template>
    <div class="breadcrumd-area">
       <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <router-link :to="{name: 'home'}"> Home </router-link> </li>
                <li class="breadcrumb-item active" aria-current="page">Single</li>
            </ol>
        </nav>
    </div>
</template>
<script>
export default {
    name: "Breadcrumb",


}
</script>
<style>
    .breadcrumd-area {
        margin-top: 6px;
    }
</style>
