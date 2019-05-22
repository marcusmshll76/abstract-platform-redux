<template>
<div class="full-width">
    <div class="row contextArea" @contextmenu.prevent="$refs.menu.open">
        <nested-draggable :data="list" />
    </div>
    <vue-context ref="menu">
        <li>
            <a href="#" @click.prevent="createFolder"><Icon type="ios-folder-open" /> Create New Folder</a>
        </li>
        <li>
            <a href="#" @click.prevent="createFile"><Icon type="ios-paper-outline" /> Create New File</a>
        </li>
    </vue-context>
</div>
</template>

<script>
import nestedDraggable from "./nestedDraggable";
import {
    VueContext
} from 'vue-context';
export default {
    name: "nested-example",
    display: "Nested",
    order: 15,
    components: {
        nestedDraggable,
        VueContext
    },
    data() {
        return {
            list: [{
                    name: "task 1",
                    type: "folder",
                    data: [{
                        name: "...",
                        data: []
                    }]
                },
                {
                    name: "task 3",
                    type: "folder",
                    data: [{
                        name: "...",
                        data: []
                    }]
                },
                {
                    name: "task 5"
                }
            ]
        };
    },
    methods: {
        createFolder: function () {
            this.list.push({
                name: 'New Folder',
                edit: true,
                type: 'folder',
                data: [{
                    name: "...",
                    data: []
                }]
            });
        },
        createFile: function () {
            this.list.push({
                name: 'New File',
                edit: true
            });
        }
    },
};
</script>

<style>
.v-context {
    outline: 0 !important;
    overflow: hidden !important;
}

.full-width {
    width: 100%;
}

.contextArea {
    width: 100%;
    min-height: 300px;
}
</style>
