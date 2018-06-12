<<<<<<< HEAD
'use strict';

/*
Object.defineProperty(exports, "__esModule", {
	value: true
});
*/

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Majax = function () {
	_createClass(Majax, null, [{
		key: 'setConfig',
		value: function setConfig(client_id, client_secret, host_api) {
			localStorage.setItem('credentials', JSON.stringify({
				client_id: client_id,
				client_secret: client_secret,
				host_api: host_api
			}));
		}
	}]);

	function Majax() {
		_classCallCheck(this, Majax);

		this.getAutentication();
		this.header = null;
		this.is_reload = false;
		var temp = localStorage.getItem('credentials');
		var c = '';
		if (temp) {
			c = JSON.parse(temp).host_api || '';
		}
		this.config = {
			login: c + 'oauth/token',
			refresh: c + 'oauth/token'
		};
		this.request_fncs = null;
		this.request_url = null;
		this.request_type = '';
		this.request_data = null;
	}

	_createClass(Majax, [{
		key: 'createHeader',
		value: function createHeader() {
			if (self.fetch) {
				if (this.header) {
					delete this.header;
				}
				this.header = new Headers();
				if (this.is_authenticate) {
					this.header.set('Authorization', this.token_type + ' ' + this.access_token);
				}
			} else {
				alert('Fetch no soportado, Favor de actualizar su navegador');
			}
		}
	}, {
		key: 'getAutentication',
		value: function getAutentication() {
			if (localStorage.getItem('authentication') != null) {
				this.is_authenticate = true;
				var auth = JSON.parse(localStorage.getItem('authentication'));
				this.access_token = auth.access_token;
				this.refresh_token = auth.refresh_token;
				this.token_type = auth.token_type;
			} else {
				this.is_authenticate = false;
			}
		}
	}, {
		key: 'requestErase',
		value: function requestErase() {
			this.request_fncs = null;
			this.request_url = null;
			this.request_type = '';
			this.request_data = null;
		}
	}, {
		key: 'logout',
		value: function logout() {
			this.access_token = null;
			this.refresh_token = null;
			this.token_type = null;
			this.valid_handle = null;
			this.reload_handle = null;
			this.error_handle = null;
			this.is_authenticate = false;
			localStorage.removeItem('authentication');
		}
		//	PARA EL RELOAD AL CULMINAR EL TOKEN DE AUTIRIZACIÓN

	}, {
		key: 'requestErase',
		value: function requestErase() {
			this.request_fncs = null;
			this.request_url = null;
			this.request_type = '';
			this.request_data = null;
		}
	}, {
		key: 'requestReload',
		value: function requestReload() {
			this.is_reload = true;
			switch (this.request_type) {
				case 'GET':
					this.get(this.request_url, this.request_fncs, this.request_data);
					break;
				case 'POST':
					this.post(this.request_url, this.request_fncs, this.request_data);
					break;
				case 'PUT':
					this.put(this.request_url, this.request_fncs, this.request_data);
					break;
				case 'DELETE':
					this.delete(this.request_url, this.request_fncs);
					break;
			}
		}
		//===================================

	}, {
		key: '__response',
		value: function __response(data) {
			console.info('iniciando pasado de la respuesta');
			var f = this.request_fncs;
			if (f && f.valid) {
				f.valid(data);
			}
		}
	}, {
		key: '__responseAjax',
		value: function __responseAjax(res) {
			var _this = this;

			console.info(res.status);
			if (res.ok) {
				switch (this.contentType) {
					case 'text':
						res.text().then(function (data) {
							return _this.__response(data);
						});
						break;
					case 'blob':
						res.blob().then(function (data) {
							return _this.__response(data);
						});
						break;
					case 'arrayBuffer':
						res.arrayBuffer().then(function (data) {
							return _this.__response(data);
						});
						break;
					default:
						console.info('interpretando json');
						res.json().then(function (data) {
							return _this.__response(data);
						});
						break;
				}
			} else if (res.status === 401 && this.is_reload === false) {
				this.oauth_refresh();
			} else {
				console.warn('Error inesperado en la petición response ajax');
				console.warn(res);
				res.json().then(function (err) {
					return _this.__errorAjax(err);
				});
			}
		}
	}, {
		key: '__errorAjax',
		value: function __errorAjax(error) {
			var f = this.request_fncs;
			console.error(error);
			if (f && f.error) {
				f.error(error);
			}
		}
	}, {
		key: 'get',
		value: function get(url, fncs) {
			var _this2 = this;

			var data = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;

			this.createHeader();
			if (data) {
				if (url.lastIndexOf('?') < 0) {
					url += "?";
				}
				switch (data.type) {
					case 'form':
						var d = new FormData(data.data);
						var ent = d.entries();
						var _iteratorNormalCompletion = true;
						var _didIteratorError = false;
						var _iteratorError = undefined;

						try {
							for (var _iterator = ent[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
								var k = _step.value;

								if (url.charAt(url.length - 1) !== "&") {
									url += "&";
								}
								url += k[0] + "=" + k[1];
							}
						} catch (err) {
							_didIteratorError = true;
							_iteratorError = err;
						} finally {
							try {
								if (!_iteratorNormalCompletion && _iterator.return) {
									_iterator.return();
								}
							} finally {
								if (_didIteratorError) {
									throw _iteratorError;
								}
							}
						}

						break;
					case 'formdata':
						var ent2 = data.data.entries();
						var _iteratorNormalCompletion2 = true;
						var _didIteratorError2 = false;
						var _iteratorError2 = undefined;

						try {
							for (var _iterator2 = ent2[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
								var v = _step2.value;

								if (url.charAt(url.length - 1) !== "&") {
									url += "&";
								}
								url += v[0] + "=" + v[1];
							}
						} catch (err) {
							_didIteratorError2 = true;
							_iteratorError2 = err;
						} finally {
							try {
								if (!_iteratorNormalCompletion2 && _iterator2.return) {
									_iterator2.return();
								}
							} finally {
								if (_didIteratorError2) {
									throw _iteratorError2;
								}
							}
						}

						break;
					case 'json':
						for (var _k in data.data) {
							if (url.charAt(url.length - 1) !== "&") {
								url += "&";
							}
							url += _k + "=" + data.data[_k];
						}
						break;
					default:
						break;
				}
			}
			this.request_fncs = fncs;
			this.request_type = 'GET';
			this.request_url = url;
			this.request_data = data;
			this.header.set('X-Requested-With', 'XMLHttpRequest');
			fetch(url, {
				method: 'GET',
				headers: this.header,
				mode: 'cors',
				cache: 'default'
			}).then(function (res) {
				return _this2.__responseAjax(res);
			}).catch(function (error) {
				return _this2.__errorAjax(error);
			});
		}
	}, {
		key: 'post',
		value: function post(url, fncs) {
			var _this3 = this;

			var data = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;

			this.createHeader();
			this.request_fncs = fncs;
			this.request_type = 'POST';
			this.request_url = url;
			this.request_data = data;
			var __body = null;
			this.header.set('X-Requested-With', 'XMLHttpRequest');
			if (data) {
				switch (data.type) {
					case 'file':
						var fd = new FormData();
						fd.append('file', data.data);
						__body = fd;
						break;
					case 'form':
						var fd2 = new FormData(data.data);
						__body = fd2;
						break;
					case 'formdata':
						__body = data.data;
						break;
					case 'json':
						this.header.set('Content-Type', 'application/json');
						__body = JSON.stringify(data.data);
						break;
					default:
						__body = data.data;
						break;
				}
			}
			fetch(url, {
				method: 'POST',
				headers: this.header,
				mode: 'cors',
				cache: 'default',
				body: __body
			}).then(function (res) {
				return _this3.__responseAjax(res);
			}).catch(function (error) {
				return _this3.__errorAjax(error);
			});
		}
	}, {
		key: 'put',
		value: function put(url, fncs) {
			var _this4 = this;

			var data = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;

			this.createHeader();
			this.request_fncs = fncs;
			this.request_type = 'PUT';
			this.request_url = url;
			this.request_data = data;
			var h = __host_api || '';
			var __body = null;
			this.header.set('X-Requested-With', 'XMLHttpRequest');
			if (data) {
				switch (data.type) {
					case 'file':
						var fd = new FormData();
						fd.append('file', data.data);
						__body = fd;
						break;
					case 'form':
						var fd2 = new FormData(data.data);
						__body = fd2;
						break;
					case 'formdata':
						__body = data.data;
						break;
					case 'json':
						this.header.set('Content-Type', 'application/json');
						__body = JSON.stringify(data.data);
						break;
					default:
						__body = data.data;
						break;
				}
			}
			fetch(url, {
				method: 'PUT',
				headers: this.header,
				mode: 'cors',
				cache: 'default',
				body: __body
			}).then(function (res) {
				return _this4.__responseAjax(res);
			}).catch(function (error) {
				return _this4.__errorAjax(error);
			});
		}
	}, {
		key: 'delete',
		value: function _delete(url, fncs) {
			var _this5 = this;

			this.createHeader();
			this.request_fncs = fncs;
			this.request_type = 'DELETE';
			this.request_url = url;
			this.request_data = data;
			fetch(url, {
				method: 'DELETE',
				headers: this.header,
				mode: 'cors',
				cache: 'default'
			}).then(function (res) {
				return _this5.__responseAjax(res);
			}).catch(function (error) {
				return _this5.__errorAjax(error);
			});
		}
	}, {
		key: 'oauth',
		value: function oauth(username, password, fncs) {
			var _this6 = this;

			this.createHeader();
			this.request_fncs = fncs;
			this.header.set('X-Requested-With', 'XMLHttpRequest');
			this.header.set('Content-Type', 'application/json');
			var temp = localStorage.getItem('credentials');
			if (temp) {
				var cred = JSON.parse(temp);
				fetch(this.config.login, {
					method: 'POST',
					headers: this.header,
					mode: 'cors',
					cache: 'default',
					body: JSON.stringify({
						grant_type: "password",
						client_id: cred.client_id,
						client_secret: cred.client_secret,
						username: username,
						password: password
					})
				}).then(function (res) {
					return _this6.__responseOauth(res);
				}).catch(function (err) {
					return _this6.__errorOauth(err);
				});
			} else {
				alert('no existe información de usuario del API');
			}
		}
	}, {
		key: '__errorOauth',
		value: function __errorOauth(err) {
			var f = this.request_fncs;
			console.info('Error oauth->' + err);
			if (f && f.error) {
				f.error(err);
			}
		}
	}, {
		key: '__responseOauth',
		value: function __responseOauth(res) {
			var _this7 = this;

			if (res.ok) {
				res.json().then(function (data) {
					return _this7.__responseJsonOauth(data);
				});
			} else {
				if (res.status >= 500 && res.status <= 600) {
					this.__errorAjax({ message: res.statusText, error: res.status });
				} else {
					res.json().then(function (err) {
						return _this7.__errorAjax(err);
					});
				}
			}
		}
	}, {
		key: '__responseJsonOauth',
		value: function __responseJsonOauth(data) {
			localStorage.setItem('authentication', JSON.stringify(data));
			this.access_token = data.access_token;
			this.refresh_token = data.refresh_token;
			this.token_type = data.token_type;
			this.is_authenticate = true;
			var f = this.request_fncs;
			if (f && f.valid) {
				f.valid(data);
			}
		}
	}, {
		key: 'oauth_refresh',
		value: function oauth_refresh() {
			var _this8 = this;

			this.createHeader();
			this.header.set('X-Requested-With', 'XMLHttpRequest');
			this.header.set('Content-Type', 'application/json');
			this.header.set('Accept', 'application/json');
			var temp = localStorage.getItem('credentials');
			if (temp) {
				var cred = JSON.parse(temp);
				fetch(this.config.refresh, {
					method: 'POST',
					headers: this.header,
					mode: 'cors',
					cache: 'default',
					body: JSON.stringify({
						grant_type: "refresh_token",
						client_id: cred.client_id,
						client_secret: cred.client_secret,
						refresh_token: this.refresh_token
					})
				}).then(function (res) {
					return _this8.__responseRefresh(res);
				}).catch(function (error) {
					return _this8.__errorAjax(error);
				});
			} else {
				alert('no existe información de usuario del API');
			}
		}
	}, {
		key: '__responseRefresh',
		value: function __responseRefresh(res) {
			var _this9 = this;

			if (res.ok) {
				res.json().then(function (data) {
					return _this9.__responseJsonRefresh(data);
				});
			} else {
				res.json().then(function (err) {
					return _this9.__errorAjax(err);
				});
			}
		}
	}, {
		key: '__responseJsonRefresh',
		value: function __responseJsonRefresh(data) {
			localStorage.setItem('authentication', JSON.stringify(data));
			this.access_token = data.access_token;
			this.refresh_token = data.refresh_token;
			this.token_type = data.token_type;
			this.is_authenticate = true;
			this.requestReload();
		}
	}]);

	return Majax;
}();

//exports.default = Majax;
;
=======
"use strict";Object.defineProperty(exports,"__esModule",{value:!0});var _createClass=function(){function s(e,t){for(var r=0;r<t.length;r++){var s=t[r];s.enumerable=s.enumerable||!1,s.configurable=!0,"value"in s&&(s.writable=!0),Object.defineProperty(e,s.key,s)}}return function(e,t,r){return t&&s(e.prototype,t),r&&s(e,r),e}}();function _classCallCheck(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}var Majax=function(){function r(){_classCallCheck(this,r),this.getAutentication(),this.header=null,this.is_reload=!1;var e=localStorage.getItem("credentials"),t="";e&&(t=JSON.parse(e).host_api||""),this.config={login:t+"oauth/token",refresh:t+"oauth/token"},this.request_fncs=null,this.request_url=null,this.request_type="",this.request_data=null}return _createClass(r,null,[{key:"setConfig",value:function(e,t,r){localStorage.setItem("credentials",JSON.stringify({client_id:e,client_secret:t,host_api:r}))}}]),_createClass(r,[{key:"createHeader",value:function(){self.fetch?(this.header&&delete this.header,this.header=new Headers,this.is_authenticate&&this.header.set("Authorization",this.token_type+" "+this.access_token)):alert("Fetch no soportado, Favor de actualizar su navegador")}},{key:"getAutentication",value:function(){if(null!=localStorage.getItem("authentication")){this.is_authenticate=!0;var e=JSON.parse(localStorage.getItem("authentication"));this.access_token=e.access_token,this.refresh_token=e.refresh_token,this.token_type=e.token_type}else this.is_authenticate=!1}},{key:"requestErase",value:function(){this.request_fncs=null,this.request_url=null,this.request_type="",this.request_data=null}},{key:"logout",value:function(){this.access_token=null,this.refresh_token=null,this.token_type=null,this.valid_handle=null,this.reload_handle=null,this.error_handle=null,this.is_authenticate=!1,localStorage.removeItem("authentication")}},{key:"requestErase",value:function(){this.request_fncs=null,this.request_url=null,this.request_type="",this.request_data=null}},{key:"requestReload",value:function(){switch(this.is_reload=!0,this.request_type){case"GET":this.get(this.request_url,this.request_fncs,this.request_data);break;case"POST":this.post(this.request_url,this.request_fncs,this.request_data);break;case"PUT":this.put(this.request_url,this.request_fncs,this.request_data);break;case"DELETE":this.delete(this.request_url,this.request_fncs)}}},{key:"__response",value:function(e){console.info("iniciando pasado de la respuesta");var t=this.request_fncs;t&&t.valid&&t.valid(e)}},{key:"__responseAjax",value:function(e){var t=this;if(console.info(e.status),e.ok)switch(this.contentType){case"text":e.text().then(function(e){return t.__response(e)});break;case"blob":e.blob().then(function(e){return t.__response(e)});break;case"arrayBuffer":e.arrayBuffer().then(function(e){return t.__response(e)});break;default:console.info("interpretando json"),e.json().then(function(e){return t.__response(e)})}else 401===e.status&&!1===this.is_reload?this.oauth_refresh():(console.warn("Error inesperado en la petición response ajax"),console.warn(e),e.json().then(function(e){return t.__errorAjax(e)}))}},{key:"__errorAjax",value:function(e){var t=this.request_fncs;console.error(e),t&&t.error&&t.error(e)}},{key:"get",value:function(e,t){var r=this,s=2<arguments.length&&void 0!==arguments[2]?arguments[2]:null;if(this.createHeader(),s)switch(e.lastIndexOf("?")<0&&(e+="?"),s.type){case"form":var a=new FormData(s.data).entries(),n=!0,i=!1,o=void 0;try{for(var h,u=a[Symbol.iterator]();!(n=(h=u.next()).done);n=!0){var c=h.value;"&"!==e.charAt(e.length-1)&&(e+="&"),e+=c[0]+"="+c[1]}}catch(e){i=!0,o=e}finally{try{!n&&u.return&&u.return()}finally{if(i)throw o}}break;case"formdata":var l=s.data.entries(),_=!0,f=!1,d=void 0;try{for(var p,y=l[Symbol.iterator]();!(_=(p=y.next()).done);_=!0){var v=p.value;"&"!==e.charAt(e.length-1)&&(e+="&"),e+=v[0]+"="+v[1]}}catch(e){f=!0,d=e}finally{try{!_&&y.return&&y.return()}finally{if(f)throw d}}break;case"json":for(var k in s.data)"&"!==e.charAt(e.length-1)&&(e+="&"),e+=k+"="+s.data[k]}e=(__host_api||"")+e,this.request_fncs=t,this.request_type="GET",this.request_url=e,this.request_data=s,this.header.set("X-Requested-With","XMLHttpRequest"),fetch(e,{method:"GET",headers:this.header,mode:"cors",cache:"default"}).then(function(e){return r.__responseAjax(e)}).catch(function(e){return r.__errorAjax(e)})}},{key:"post",value:function(e,t){var r=this,s=2<arguments.length&&void 0!==arguments[2]?arguments[2]:null;this.createHeader(),this.request_fncs=t,this.request_type="POST",this.request_url=e,this.request_data=s,e=(__host_api||"")+e;var a=null;if(this.header.set("X-Requested-With","XMLHttpRequest"),s)switch(s.type){case"file":var n=new FormData;n.append("file",s.data),a=n;break;case"form":a=new FormData(s.data);break;case"formdata":a=s.data;break;case"json":this.header.set("Content-Type","application/json"),a=JSON.stringify(s.data);break;default:a=s.data}fetch(e,{method:"POST",headers:this.header,mode:"cors",cache:"default",body:a}).then(function(e){return r.__responseAjax(e)}).catch(function(e){return r.__errorAjax(e)})}},{key:"put",value:function(e,t){var r=this,s=2<arguments.length&&void 0!==arguments[2]?arguments[2]:null;this.createHeader(),this.request_fncs=t,this.request_type="PUT",this.request_url=e,this.request_data=s,e=(__host_api||"")+e;var a=null;if(this.header.set("X-Requested-With","XMLHttpRequest"),s)switch(s.type){case"file":var n=new FormData;n.append("file",s.data),a=n;break;case"form":a=new FormData(s.data);break;case"formdata":a=s.data;break;case"json":this.header.set("Content-Type","application/json"),a=JSON.stringify(s.data);break;default:a=s.data}fetch(e,{method:"PUT",headers:this.header,mode:"cors",cache:"default",body:a}).then(function(e){return r.__responseAjax(e)}).catch(function(e){return r.__errorAjax(e)})}},{key:"delete",value:function(e,t){var r=this;this.createHeader(),this.request_fncs=t,this.request_type="DELETE",this.request_url=e,this.request_data=data,e=(__host_api||"")+e,fetch(e,{method:"DELETE",headers:this.header,mode:"cors",cache:"default"}).then(function(e){return r.__responseAjax(e)}).catch(function(e){return r.__errorAjax(e)})}},{key:"oauth",value:function(e,t,r){var s=this;this.createHeader(),this.request_fncs=r,this.header.set("X-Requested-With","XMLHttpRequest"),this.header.set("Content-Type","application/json");var a=localStorage.getItem("credentials");if(a){var n=JSON.parse(a);fetch(this.config.login,{method:"POST",headers:this.header,mode:"cors",cache:"default",body:JSON.stringify({grant_type:"password",client_id:n.client_id,client_secret:n.client_secret,username:e,password:t})}).then(function(e){return s.__responseOauth(e)}).catch(function(e){return s.__errorOauth(e)})}else alert("no existe información de usuario del API")}},{key:"__errorOauth",value:function(e){var t=this.request_fncs;console.info("Error oauth->"+e),t&&t.error&&t.error(e)}},{key:"__responseOauth",value:function(e){var t=this;e.ok?e.json().then(function(e){return t.__responseJsonOauth(e)}):500<=e.status&&e.status<=600?this.__errorAjax({message:e.statusText,error:e.status}):e.json().then(function(e){return t.__errorAjax(e)})}},{key:"__responseJsonOauth",value:function(e){localStorage.setItem("authentication",JSON.stringify(e)),this.access_token=e.access_token,this.refresh_token=e.refresh_token,this.token_type=e.token_type,this.is_authenticate=!0;var t=this.request_fncs;t&&t.valid&&t.valid(e)}},{key:"oauth_refresh",value:function(){var t=this;this.createHeader(),this.header.set("X-Requested-With","XMLHttpRequest"),this.header.set("Content-Type","application/json"),this.header.set("Accept","application/json");var e=localStorage.getItem("credentials");if(e){var r=JSON.parse(e);fetch(this.config.refresh,{method:"POST",headers:this.header,mode:"cors",cache:"default",body:JSON.stringify({grant_type:"refresh_token",client_id:r.client_id,client_secret:r.client_secret,refresh_token:this.refresh_token})}).then(function(e){return t.__responseRefresh(e)}).catch(function(e){return t.__errorAjax(e)})}else alert("no existe información de usuario del API")}},{key:"__responseRefresh",value:function(e){var t=this;e.ok?e.json().then(function(e){return t.__responseJsonRefresh(e)}):e.json().then(function(e){return t.__errorAjax(e)})}},{key:"__responseJsonRefresh",value:function(e){localStorage.setItem("authentication",JSON.stringify(e)),this.access_token=e.access_token,this.refresh_token=e.refresh_token,this.token_type=e.token_type,this.is_authenticate=!0,this.requestReload()}}]),r}();exports.default=Majax;
>>>>>>> 7f79a8a76e384b2befb3e2cbaf8bcea0dbcf26ec
