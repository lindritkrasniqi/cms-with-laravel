<template>
    <div>
        <button class="header-toggler px-md-0 me-md-3" type="button" @click.prevent="toggle">
            <i class="fa fa-reorder"></i>
        </button>
    </div>
</template>

<script setup>
import { Sidebar } from "@coreui/coreui";

const toggle = () => {
    Sidebar.getInstance(document.querySelector('#sidebar')).toggle();
}
</script>