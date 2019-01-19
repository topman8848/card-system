webpackJsonp([21],{"2owH":function(t,e,s){"use strict";var a,l,i,o,r,m,n,_;Object.defineProperty(e,"__esModule",{value:!0}),a=s("woOf"),l=s.n(a),i=s("Y81h"),o=s.n(i),r=s("V/8j"),m={components:{},data:function(){return{loading:!1,labelWidth:"0px",form:{mail_driver:"",mail_smtp_host:"",mail_smtp_port:"",mail_smtp_username:"",mail_smtp_password:"",mail_smtp_from_address:"",mail_smtp_from_name:"",mail_smtp_encryption:"",sendcloud_user:"",sendcloud_key:"",mail_send_order:0},formRules:{},testEmail:"",sending:!1}},watch:{loading:function(t,e){t?e||o.a.isStarted()||o.a.start():o.a.done()}},mounted:function(){this.getSet(),this.testEmail=this.$store.state.user.userInfo.email},methods:{getSet:function(){var t=this;this.loading=!0,Object(r.a)().then(function(e){l()(t.form,e.data),t.loading=!1})},handleResetForm:function(){this.getSet()},handleSubmit:function(){var t=this;this.$refs.form.validate(function(e){e&&(t.loading=!0,Object(r.a)(t.form).then(function(){t.loading=!1,t.$notify({title:"操作成功",message:"配置保存成功",type:"success"})}).catch(function(){t.loading=!1}))})},handleEmailTest:function(){var t=this;this.sending=!0,Object(r.b)(this.testEmail).then(function(e){t.sending=!1,t.$alert(e.data,"发送成功",{type:"success"})}).finally(function(){t.sending=!1})}}},n={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("el-card",[s("el-form",{directives:[{name:"loading",rawName:"v-loading.body",value:t.loading,expression:"loading",modifiers:{body:!0}}],ref:"form",attrs:{model:t.form,"label-width":t.labelWidth,rules:t.formRules}},[s("h2",{staticClass:"title"},[t._v("邮件驱动")]),t._v(" "),s("el-form-item",{staticClass:"item-container"},[s("span",[t._v("驱动")]),t._v(" "),s("el-radio-group",{model:{value:t.form.mail_driver,callback:function(e){t.$set(t.form,"mail_driver",e)},expression:"form.mail_driver"}},[s("el-radio",{attrs:{label:"smtp"}}),t._v(" "),s("el-radio",{attrs:{label:"sendcloud"}})],1)],1),t._v(" "),s("el-form-item",{staticClass:"item-container",attrs:{prop:"mail_smtp_from_address"}},[s("span",[t._v("发件人地址")]),t._v(" "),s("el-input",{attrs:{type:"text",placeholder:"发件人地址"},model:{value:t.form.mail_smtp_from_address,callback:function(e){t.$set(t.form,"mail_smtp_from_address",e)},expression:"form.mail_smtp_from_address"}})],1),t._v(" "),s("el-form-item",{staticClass:"item-container",attrs:{prop:"mail_smtp_from_name"}},[s("span",[t._v("发件人姓名")]),t._v(" "),s("el-input",{attrs:{type:"text",placeholder:"发件人姓名"},model:{value:t.form.mail_smtp_from_name,callback:function(e){t.$set(t.form,"mail_smtp_from_name",e)},expression:"form.mail_smtp_from_name"}})],1),t._v(" "),"smtp"===t.form.mail_driver?s("div",[s("el-form-item",{staticClass:"item-container",attrs:{prop:"mail_smtp_host"}},[s("span",[t._v("服务器地址")]),t._v(" "),s("el-input",{attrs:{type:"text",placeholder:"服务器地址"},model:{value:t.form.mail_smtp_host,callback:function(e){t.$set(t.form,"mail_smtp_host",e)},expression:"form.mail_smtp_host"}})],1),t._v(" "),s("el-form-item",{staticClass:"item-container",attrs:{prop:"mail_smtp_port"}},[s("span",[t._v("服务器端口")]),t._v(" "),s("el-input",{attrs:{type:"text",placeholder:"25(null)/465(ssl)/587(tls)"},model:{value:t.form.mail_smtp_port,callback:function(e){t.$set(t.form,"mail_smtp_port",e)},expression:"form.mail_smtp_port"}})],1),t._v(" "),s("el-form-item",{staticClass:"item-container",attrs:{prop:"mail_smtp_username"}},[s("span",[t._v("用户名")]),t._v(" "),s("el-input",{attrs:{type:"text",placeholder:"用户名"},model:{value:t.form.mail_smtp_username,callback:function(e){t.$set(t.form,"mail_smtp_username",e)},expression:"form.mail_smtp_username"}})],1),t._v(" "),s("el-form-item",{staticClass:"item-container",attrs:{prop:"mail_smtp_password"}},[s("span",[t._v("密码")]),t._v(" "),s("el-input",{attrs:{type:"text",placeholder:"密码"},model:{value:t.form.mail_smtp_password,callback:function(e){t.$set(t.form,"mail_smtp_password",e)},expression:"form.mail_smtp_password"}})],1),t._v(" "),s("el-form-item",{staticClass:"item-container",attrs:{prop:"mail_smtp_encryption"}},[s("span",[t._v("加密")]),t._v(" "),s("el-input",{attrs:{type:"text",placeholder:"null/ssl/tls"},model:{value:t.form.mail_smtp_encryption,callback:function(e){t.$set(t.form,"mail_smtp_encryption",e)},expression:"form.mail_smtp_encryption"}})],1)],1):t._e(),t._v(" "),"sendcloud"===t.form.mail_driver?s("div",[s("el-form-item",{staticClass:"item-container",attrs:{prop:"sendcloud_user"}},[s("span",[t._v("User")]),t._v(" "),s("el-input",{attrs:{type:"text",placeholder:"User"},model:{value:t.form.sendcloud_user,callback:function(e){t.$set(t.form,"sendcloud_user",e)},expression:"form.sendcloud_user"}})],1),t._v(" "),s("el-form-item",{staticClass:"item-container",attrs:{prop:"sendcloud_key"}},[s("span",[t._v("Key")]),t._v(" "),s("el-input",{attrs:{type:"text",placeholder:"Key"},model:{value:t.form.sendcloud_key,callback:function(e){t.$set(t.form,"sendcloud_key",e)},expression:"form.sendcloud_key"}})],1)],1):t._e(),t._v(" "),s("h2",{staticClass:"title",staticStyle:{"margin-top":"48px"}},[t._v("测试发送")]),t._v(" "),s("el-form-item",{staticClass:"item-container"},[s("el-input",{attrs:{placeholder:"请输入邮箱"},model:{value:t.testEmail,callback:function(e){t.testEmail=e},expression:"testEmail"}})],1),t._v(" "),s("el-form-item",{staticClass:"item-container"},[s("el-button",{attrs:{size:"small",loading:t.sending},on:{click:t.handleEmailTest}},[t._v(t._s(t.sending?"发送中":"发送"))])],1),t._v(" "),s("h2",{staticClass:"title",staticStyle:{"margin-top":"48px"}},[t._v("邮件发送选项")]),t._v(" "),s("el-form-item",{staticClass:"item-container"},[s("el-switch",{attrs:{"inactive-text":"发送卡密到买家邮箱","active-value":1,"inactive-value":0},model:{value:t.form.mail_send_order,callback:function(e){t.$set(t.form,"mail_send_order",e)},expression:"form.mail_send_order"}}),t._v(" "),s("span",{staticClass:"tip",staticStyle:{display:"block","margin-top":"-12px"}},[t._v("注意：只有当联系方式为邮箱时才会发送")])],1)],1),t._v(" "),s("div",{staticClass:"text-center",staticStyle:{"margin-top":"24px"}},[s("el-button",{on:{click:t.handleResetForm}},[t._v("刷新")]),t._v(" "),s("el-button",{attrs:{type:"primary",loading:t.loading},nativeOn:{click:function(e){t.handleSubmit(e)}}},[t._v("保存更改")])],1)],1)},staticRenderFns:[]},_=s("VU/8")(m,n,!1,null,null,null),e.default=_.exports}});