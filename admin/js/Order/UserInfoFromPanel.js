/**
 * Created by YHB on 14-8-6.
 */
Ext.ns('visa');
visa.UserInfoFromPanel = Ext.extend(Ext.form.FormPanel, {

	constructor : function(config) {

		Ext.apply(config, {
			autoScroll: true,
			border : false,
			bodyBorder : false,
			labelAlign : 'right',
			labelWidth : 150,
			frame : true,
			waitMsgTarget : true,
			bodyStyle: {
                background:'#dfe8f6',
                padding:'20px 10px'
            },
			title : '编辑客户信息',
			items : [{
				xtype: 'fieldset',
				title: '用户基本信息',
				items: [{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '中文名',
							name: 'username'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '英文姓氏',
							name: 'enxing'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '英文名',
							name: 'enming'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '曾用名姓氏',
							name: 'cenxing'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '曾用名名',
							name: 'cenming'
						}]
					}]
				},{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '姓电码',
							name: 'xingdianma'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '名电码',
							name: 'mingdianma'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'radiogroup',
							fieldLabel: '性别',
							items: [
								{boxLabel: '男', inputValue: 'M', name: 'gender'},
								{boxLabel: '女', inputValue: 'F', name: 'gender'}
							]
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '出生日期',
							name: 'birthday'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'combo',
							fieldLabel: '婚姻状况',
							name: 'maritalstatus',
					        displayField:'name',
					        valueField: 'value',
					        typeAhead: true,
					        mode: 'local',
					        forceSelection: true,
					        triggerAction: 'all',
					        emptyText:'请选择婚姻状况',
					        selectOnFocus:true,
					        store: new Ext.data.ArrayStore({
					            fields: ['name', 'value'],
					            data : [['已婚', 'M'], ['普通法律婚姻', 'C'], ['民事婚姻/国内同居', 'P'], 
					                    ['单身(未婚)', 'S'], ['丧偶', 'W'], ['离异', 'D'], ['合法分居', 'L'], ['其他', 'O']]
					        })
						}]
					}]
				}, {
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '出生国家',
							name: 'birthcountry'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '出生省/市',
							name: 'birthprovince'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '出生地级市/县',
							name: 'birthcity'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '出生国家(拼音)',
							name: 'enbirthcountry'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '出生省/市(拼音)',
							name: 'enbirthprovince'
						}]
					}]
				}, {
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '出生城市(拼音)',
							name: 'enbirthcity'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '身份证号码',
							name: 'cardno'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '美国社会安全号',
							name: 'ussafeno'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '美国纳税人身份号码',
							name: 'taxno'
						}]
					}]
				}]
			}, {
				xtype: 'fieldset',
				title: '国籍相关',
				items: [{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '国籍',
							name: 'country'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '其他国家国籍1',
							name: 'othercountry1'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '其他国家护照1',
							name: 'othercountrypassport1'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '其他国家国籍2',
							name: 'othercountry2'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '其他国家护照2',
							name: 'othercountrypassport2'
						}]
					}]
				}]
			}, /*开始*/{
				xtype: 'fieldset',
				title: '家庭住址和联系方式',
				items: [/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '国家',
							name: 'homecountry'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '省/市',
							name: 'homeprovince'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '市/县',
							name: 'homecity'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '街道地址',
							name: 'homestreet'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '邮编',
							name: 'zipcode'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '常用电话',
							name: 'phone1'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '备用电话',
							name: 'phone2'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '工作电话',
							name: 'phone3'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '电子邮箱',
							name: 'email'
						}]
					}]
				}/*end*/]
			}/*结束*/, {
				xtype: 'fieldset',
				title: '护照信息',
				items: [{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '护照类型',
							name: 'passporttype'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '护照号码',
							name: 'passportno'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '护照本编号',
							name: 'passportbookno'
						}]
					}]
				}, {
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '护照签发地国家',
							name: 'portcountry'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '护照签发地(省市)',
							name: 'portprovince'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '护照签发地(市县)',
							name: 'portcity'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '护照签发日期',
							name: 'portstartdate'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '护照有效期至',
							name: 'portenddate'
						}]
					}]
				}, {
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '丢失的护照号码',
							name: 'portlostno1'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '丢失护照的签发国家',
							name: 'portlostcountry1'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '丢失原因',
							name: 'portlostexplain1'
						}]
					}]
				}, {
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '丢失的护照号码',
							name: 'portlostno2'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '丢失护照的签发国家',
							name: 'portlostcountry2'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '丢失原因',
							name: 'portlostexplain2'
						}]
					}]
				}]
			}, /*开始*/{
				xtype: 'fieldset',
				title: '赴美信息',
				items: [/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '赴美目的',
							name: 'tripintent'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '是否指定了详细计划',
							name: 'haveplan'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '抵达美国时间',
							name: 'arrdate'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '抵达美国城市',
							name: 'arrcity'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '离开美国时间',
							name: 'departdate'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '从美国哪个城市离开',
							name: 'departcity'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '在美国哪些城市停留',
							name: 'stoplocation'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '在美联系地址(州/区)',
							name: 'stopstate'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '在美联系地址(城市)',
							name: 'stopcity'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '在美联系地址(街道)',
							name: 'stopstreet'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '在美联系地址邮编',
							name: 'stopzipcode'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '计划抵达美国时间<span style="color:red;">[小孩]</span>',
							name: 'planarrdate'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '计划在美停留时间<span style="color:red;">[小孩]</span>',
							name: 'planstopday'
						}]
					}]
				}/*end*/]
			}/*结束*/, /*开始*/{
				xtype: 'fieldset',
				title: '赴美费用信息',
				items: [/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '费用支付人',
							name: 'payingperson'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '支付人姓氏',
							name: 'otherpersonxing'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '支付人名',
							name: 'otherpersonming'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '支付人电话',
							name: 'otherpersonphone'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '支付人邮箱',
							name: 'otherpersonemail'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '与支付人的关系',
							name: 'otherpersonrelations'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '赴美团名',
							name: 'groupname'
						}]
					}]
				}/*end*/]
			}/*结束*/, /*开始*/{
				xtype: 'fieldset',
				title: '是否去过美国',
				checkboxToggle:true,
				collapsed: true,
				items: [/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '最后一次访问时间?',
							name: 'everarridate1'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '倒数第二次访问时间?',
							name: 'everarridate2'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '倒数第三次访问时间',
							name: 'everarridate3'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '倒数第四次访问时间',
							name: 'everarridate4'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '倒数第五次访问时间',
							name: 'everarridate5'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '最后一次停留时间?',
							name: 'everdays1'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '倒数第二次停留时间?',
							name: 'everdays2'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '倒数第三次停留时间?',
							name: 'everdays3'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '倒数第四次停留时间?',
							name: 'everdays4'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '倒数第五次停留时间?',
							name: 'everdays5'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '你是否有美国驾照?',
							name: 'haveusdriver'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '驾照号码?',
							name: 'driverno'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '驾照所属地区?',
							name: 'driverstate'
						}]
					}]
				}/*end*/]
			}/*结束*/, /*开始*/{
				xtype: 'fieldset',
				title: '你曾经是否获得美国签证?',
				checkboxToggle:true,
				collapsed: true,
				items: [/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '上一次获得美国签证时间',
							name: 'lastvisadate'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '签证号码',
							name: 'visano'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '此次是否申请同类签证',
							name: 'samevisatype'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '是否在美国领馆留过十指指纹',
							name: 'tenprinted'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '你的签证是否遗失过?',
							name: 'lostusvisa'
						}]
					}, {
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '是哪一年遗失的?',
							name: 'lostyear'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '遗失的原因?',
							name: 'lostexplain'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '你的签证是否被注销过?',
							name: 'revokevisa'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '被注销的原因?',
							name: 'revokeexplain'
						}] //
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: 1,
						layout: 'form',
						labelWidth:519,
						items: [{
							xtype: 'textfield',
							fieldLabel: '您现在申请签证的所在国家或地点同于您上个签证颁发所在国或地点吗? 此国家或地点是您主要居住地吗?',
							name: 'countryeqcountry'
						}]
					}]
				}]
			}/*结束*/, /*开始*/{
				xtype: 'fieldset',
				title: '家庭住址和联系方式',
				items: [/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .3,
						labelWidth:300,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '您被拒签过吗?或在入境口岸被拒入境，或被撤销入境申请?',
							name: 'refusedvisa'
						}]
					},{
						columnWidth: .7,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '解释被拒签的原因?',
							name: 'refusedexplain',
							anchor : '90%'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .3,
						layout: 'form',
						labelWidth:300,
						items: [{
							xtype: 'textfield',
							fieldLabel: '曾有人在公民及移民服务局为您申请过移民吗?',
							name: 'immigration'
						}]
					},{
						columnWidth: .7,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '如有,请解释原因?',
							name: 'immigrationexpain',
							anchor : '90%'
						}]
					}]
				}/*end*/]
			}/*结束*/, /*开始*/{
				xtype: 'fieldset',
				title: '在美联系人',
				items: [/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '联系人姓氏',
							name: 'contactxing'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '联系人名',
							name: 'contactming'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '组织名',
							name: 'contactorganname'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '与您的关系',
							name: 'contactrelation'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '在美联系地址(街道)',
							name: 'contactstreet'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '在美联系地址(城市)',
							name: 'contactcity'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '在美联系地址(区)',
							name: 'contactstate'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '在美邮编',
							name: 'contactzipcode'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '在美联系电话',
							name: 'contactphone'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '在美联系地址邮箱',
							name: 'contactemail'
						}]
					}]
				}/*end*/]
			}/*结束*/, /*开始*/{
				xtype: 'fieldset',
				title: '家属关系',
				items: [/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '父亲姓氏',
							name: 'fatherxing'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '父亲名',
							name: 'fatherming'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '父亲生日',
							name: 'fatherbirth'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '父亲是否在美国',
							name: 'fatherinus'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '父亲在美国的身份?',
							name: 'fatherstatus'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '母亲姓氏',
							name: 'motherxing'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '母亲名',
							name: 'motherming'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '母亲生日',
							name: 'motherbirth'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '母亲是否在美国',
							name: 'motherinus'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '母亲在美国的身份?',
							name: 'motherstatus'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '配偶姓氏',
							name: 'spousename'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '配偶姓名',
							name: 'homeprovince'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '配偶生日',
							name: 'spousedate'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '配偶国籍',
							name: 'spousecountry'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '配偶出生国家',
							name: 'spousebirtycountry'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '配偶出生城市',
							name: 'spousebirtycity'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '配偶联系地址',
							name: 'spouseaddress'
						}]
					}]
				}/*end*/]
			}/*结束*/, /*开始*/{
				xtype: 'fieldset',
				title: '是否有其他直系亲属在美国?',
				items: [/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属1姓氏',
							name: 'zhixixing1'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属1名',
							name: 'zhiximing1'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属1与您的关系',
							name: 'zhixirelation1'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属1在美身份',
							name: 'zhixistatus1'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属2姓氏',
							name: 'zhixixing2'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属2名',
							name: 'zhiximing2'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属2与您的关系',
							name: 'zhixirelation2'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属2在美身份',
							name: 'zhixistatus2'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属3姓氏',
							name: 'zhixixing3'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属3名',
							name: 'zhiximing3'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属3与您的关系',
							name: 'zhixirelation3'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属3在美身份',
							name: 'zhixistatus3'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属4姓氏',
							name: 'zhixixing4'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属4名',
							name: 'zhiximing4'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属4与您的关系',
							name: 'zhixirelation4'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属4在美身份',
							name: 'zhixistatus4'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属5姓氏',
							name: 'zhixixing5'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属5名',
							name: 'zhiximing5'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属5与您的关系',
							name: 'zhixirelation5'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '亲属5在美身份',
							name: 'zhixistatus5'
						}]
					}]
				}/*end*/]
			}/*结束*/, /*开始*/{
				xtype: 'fieldset',
				title: '工作/学校相关信息',
				items: [/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '主要职业',
							name: 'currentwork'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '公司/学校名',
							name: 'currentworkname'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在省',
							name: 'currentstate'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在城市',
							name: 'currentcity'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在街道',
							name: 'currentstreet'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '邮编',
							name: 'currentzipcode'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '税前月薪',
							name: 'currentincome'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '工作职责',
							name: 'currentexplain'
						}]
					}]
				}/*end*/]
			}/*结束*/, /*开始*/{
				xtype: 'fieldset',
				title: '以前的工作',
				items: [/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '公司1名',
							name: 'employname1'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所属省',
							name: 'employprovince1'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所属市',
							name: 'employcity1'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在街道',
							name: 'employstreet1'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '邮编',
							name: 'employzipcode1'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '联系电话',
							name: 'employphone1'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '职务名称',
							name: 'employjobtitle1'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '上司姓氏',
							name: 'employsuperxing1'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '上司姓名',
							name: 'employsuperming1'
						}]
					}, {
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '入职时间',
							name: 'employstartdate1'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '离职时间',
							name: 'employsenddate1'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '工作职责',
							name: 'employdesc1'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '公司2名',
							name: 'employname2'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所属省',
							name: 'employprovince2'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所属市',
							name: 'employcity2'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在街道',
							name: 'employstreet2'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '邮编',
							name: 'employzipcode2'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '联系电话',
							name: 'employphone2'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '职务名称',
							name: 'employjobtitle2'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '上司姓氏',
							name: 'employsuperxing2'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '上司姓名',
							name: 'employsuperming2'
						}]
					}, {
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '入职时间',
							name: 'employstartdate2'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '离职时间',
							name: 'employsenddate2'
						}]
					},{
						columnWidth: .16,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '工作职责',
							name: 'employdesc2'
						}]
					}]
				}/*end*/]
			}/*结束*/, /*开始*/{
				xtype: 'fieldset',
				title: '学业信息',
				items: [/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '学校名称',
							name: 'schoolname1'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所学专业',
							name: 'study1'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在国家',
							name: 'schoolcountry1'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在省',
							name: 'schoolprovince1'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在城市',
							name: 'schoolcity1'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在街道',
							name: 'schoolstreet1'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '邮政编码',
							name: 'schoolzipcode1'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '入学时间',
							name: 'schoolstartdate1'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '毕业时间',
							name: 'schoolenddate1'
						}]
					}]
				}/*end*/, /*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '学校名称',
							name: 'schoolname2'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所学专业',
							name: 'study2'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在国家',
							name: 'schoolcountry2'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在省',
							name: 'schoolprovince2'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在城市',
							name: 'schoolcity2'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在街道',
							name: 'schoolstreet2'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '邮政编码',
							name: 'schoolzipcode2'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '入学时间',
							name: 'schoolstartdate2'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '毕业时间',
							name: 'schoolenddate2'
						}]
					}]
				}/*end*/, /*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '学校名称',
							name: 'schoolname3'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所学专业',
							name: 'study3'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在国家',
							name: 'schoolcountry3'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在省',
							name: 'schoolprovince3'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在城市',
							name: 'schoolcity3'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在街道',
							name: 'schoolstreet3'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '邮政编码',
							name: 'schoolzipcode3'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '入学时间',
							name: 'schoolstartdate3'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '毕业时间',
							name: 'schoolenddate3'
						}]
					}]
				}/*end*/, /*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '学校名称',
							name: 'schoolname4'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所学专业',
							name: 'study4'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在国家',
							name: 'schoolcountry4'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在省',
							name: 'schoolprovince4'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在城市',
							name: 'schoolcity4'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在街道',
							name: 'schoolstreet4'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '邮政编码',
							name: 'schoolzipcode4'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '入学时间',
							name: 'schoolstartdate4'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '毕业时间',
							name: 'schoolenddate4'
						}]
					}]
				}/*end*/, /*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '学校名称',
							name: 'schoolname5'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所学专业',
							name: 'study5'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在国家',
							name: 'schoolcountry5'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在省',
							name: 'schoolprovince5'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在城市',
							name: 'schoolcity5'
						}]
					}]
				}/*end*/,/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '所在街道',
							name: 'schoolstreet5'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '邮政编码',
							name: 'schoolzipcode5'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '入学时间',
							name: 'schoolstartdate5'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '毕业时间',
							name: 'schoolenddate5'
						}]
					}]
				}/*end*/]
			}/*结束*/, /*开始*/{
				xtype: 'fieldset',
				title: '其他信息',
				items: [/*start*/{
					layout : 'column',
					items: [{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '会说的语言',
							name: 'language'
						}]
					},{
						columnWidth: .2,
						layout: 'form',
						items: [{
							xtype: 'textfield',
							fieldLabel: '最近5年内去过的国家',
							name: 'anycountry'
						}]
					}]
				}/*end*/]
			}/*结束*/],
			tbar : [ {
				text : '保存',
				iconCls : 'visa-action-save',
				handler : this.doSaveQuesiton,
				scope : this
			}, {
				text : '清空',
				iconCls : 'visa-action-clear',
				handler : this.doClearContent,
				scope : this
			} ]
		});
		visa.UserInfoFromPanel.superclass.constructor.apply(this, arguments);

		this.addEvents('addsuccess');
		this.on('afterrender', function() {
			Ext.Ajax.request( {
				url : '/visaadmin.php/Order/queryById',
				scope : this,
				success : function(response) {
					var obj = JSON.parse(response.responseText);
					var en = obj['username'].toPinyin().split(' ');
					obj['enxing'] = en[0].toUpperCase();
					var tempStr = '';
					for(var i=1;i<en.length;i++){
						tempStr += en[i];
					}
					obj['enming'] = tempStr.toUpperCase();
					
					var en = obj['username2'].toPinyin().split(' ');
					obj['cenxing'] = en[0].toUpperCase();
					var tempStr = '';
					for(var i=1;i<en.length;i++){
						tempStr += en[i];
					}
					obj['cenming'] = tempStr.toUpperCase();
					
					
					var oDianMaEl = $(obj.dianma).appendTo($('#dianma'));
					var oLis = oDianMaEl.find('li');
					obj['xingdianma'] = oLis.eq(0).text().split("：")[1];
					tempStr = '';
					for(var i=1;i<oLis.length;i++){
						tempStr += oLis.eq(i).text().split("：")[1];
					}
					obj['mingdianma'] = tempStr;
					
					
					obj['enbirthcountry'] = 'CHINA' || obj['birthcountry'].toPinyin().toUpperCase().replace(/ /g, '');
					obj['enbirthprovince'] = obj['birthprovince'].toPinyin().toUpperCase().replace(/ /g, '');
					obj['enbirthcity'] = obj['birthcity'].toPinyin().toUpperCase().replace(/ /g, '');
					
					obj['country'] = 'CHINA';
					
					this.getForm().loadRecord(new Ext.data.Record(obj));
				},
				failure : function() {
				},
				params : {
					id : Visa.orderId
				}
			});
		});
	},

	doSaveQuesiton : function() {
		var title = this.titleField.getValue();
		var content = this.uEditor.getContent();

		Ext.Ajax.request( {
			url : '/visaadmin.php/Question/insert',
			params : {
				title : title,
				content : content
			},
			scope : this,
			success : function() {
				this.fireEvent('addsuccess', this);
			}
		});
	},

	doClearContent : function() {
		this.titleField.setValue('');
		this.uEditor.setContent('');
	}
});