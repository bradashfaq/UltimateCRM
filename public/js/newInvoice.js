!function(e){function t(r){if(n[r])return n[r].exports;var i=n[r]={i:r,l:!1,exports:{}};return e[r].call(i.exports,i,i.exports,t),i.l=!0,i.exports}var n={};t.m=e,t.c=n,t.i=function(e){return e},t.d=function(e,n,r){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:r})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="",t(t.s=40)}({11:function(e,t){new Vue({el:"#newInvoice",data:{item_details:[{description:null,quantity:null,price:null}],due_date:null,project_id:null,recurring_date:null,recurring_due_date:null,notes:null,recurringChecked:!1,discount:null,errors:[]},methods:{addInvoiceItem:function(e){this.canAddItemOrProceed()&&this.item_details.push({description:null,quantity:null,price:null})},submitForm:function(e){var t=this;this.canAddItemOrProceed()&&axios.post(e.target.action,this.$data).then(function(e){return window.location.href="../invoices"}).catch(function(e){if(e.response.status>=500)t.errors.push(e.response.data.message);else{var n=e.response.data;Object.keys(n).forEach(function(e){t.errors.push(n[e][0])})}})},canAddItemOrProceed:function(){this.errors=[];var e=!0;return this.item_details.forEach(function(t){if(!t.description||!t.quantity||!t.price)return void(e=!1)}),e||this.errors.push("You must complete all existing invoice items before adding a new one or proceeding"),e},removeInvoiceItem:function(e){this.errors=[],this.item_details.length>1?this.item_details.splice(e,1):this.errors.push("You cannot remove your only item")}},created:function(){var e="project_id",t=window.location.href;e=e.replace(/[\[\]]/g,"\\$&");var n=new RegExp("[?&]"+e+"(=([^&#]*)|&|#|$)"),r=n.exec(t);return r?r[2]?void(this.project_id=decodeURIComponent(r[2].replace(/\+/g," "))):"":null}})},40:function(e,t,n){e.exports=n(11)}});