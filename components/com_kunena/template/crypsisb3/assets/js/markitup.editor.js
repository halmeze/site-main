bbcodeSettings = {
		previewParserPath:	'',
		markupSet: [{className: 'boldbutton',name: 'Bold',name: 'ตัวหนา',key: 'B',openWith: '[b]',closeWith: '[/b]'},{className: 'italicbutton',name: 'Italic',name: 'ตัวหนา',key: 'I',openWith: '[i]',closeWith: '[/i]'},{className: 'underlinebutton',name: 'Underline',name: 'ขีดเส้นใต้ข้อความ',key: 'U',openWith: '[u]',closeWith: '[/u]'},{className: 'strokebutton',name: 'Stroke',name: 'ขีดคร่อมข้อความ',key: 'T',openWith: '[strike]',closeWith: '[/strike]'},{className: 'subscriptbutton',name: 'Subscript',name: 'ตัวห้อย',key: 'T',openWith: '[sub]',closeWith: '[/sub]'},{className: 'supscriptbutton',name: 'Supscript',name: 'ตัวยก',key: 'T',openWith: '[sup]',closeWith: '[/sup]'},{className: 'sizebutton', name:'ขนาดฟอนท์: ทำการเลือกขนาดฟอนท์ เพื่อใช้กับข้อความที่กำหนด', key:'S', openWith:'[size=[![Text size]!]]', closeWith:'[/size]',	dropMenu :[
						{name: 'เล็กมาก', openWith:'[size=1]', closeWith:'[/size]' },
						{name: 'ขนาดเล็กมาก', openWith:'[size=2]', closeWith:'[/size]' },
						{name: 'ขนาดเล็ก', openWith:'[size=3]', closeWith:'[/size]' },
						{name: 'ปกติ', openWith:'[size=4]', closeWith:'[/size]' },
						{name: 'ใหญ่', openWith:'[size=5]', closeWith:'[/size]' },
						{name: 'ใหญ่กว่า', openWith:'[size=6]', closeWith:'[/size]' }
						]},{className: 'colors', name:'สีตัวอักษร', key:'', openWith:'[color=[![Color]!]]', closeWith:'[/color]',dropMenu: [
						{name: 'สีดำ',	openWith:'[color=black]', 	closeWith:'[/color]', className:'col1-1' },
						{name: 'สีส้ม',	openWith:'[color=orange]', 	closeWith:'[/color]', className:'col1-2' },
						{name: 'สีแดง', 	openWith:'[color=red]', 	closeWith:'[/color]', className:'col1-3' },

						{name: 'สีฟ้า', 	openWith:'[color=blue]', 	closeWith:'[/color]', className:'col2-1' },
						{name: 'สีม่วง', openWith:'[color=purple]', 	closeWith:'[/color]', className:'col2-2' },
						{name: 'สีเขียว', 	openWith:'[color=green]', 	closeWith:'[/color]', className:'col2-3' },

						{name: 'สีขาว', 	openWith:'[color=white]', 	closeWith:'[/color]', className:'col3-1' },
						{name: 'สีเทา', 	openWith:'[color=gray]', 	closeWith:'[/color]', className:'col3-2' }
						]},{separator:'|' },{className: 'bulletedlistbutton',name: 'Unordered List',name: 'ลิสต์ชนิดไม่เรียงลำดับ',openWith: '[ul]\n  [li]',closeWith: '[/li]\n  [li][/li]\n[/ul]'},{className: 'numericlistbutton',name: 'Ordered List',name: 'ลิสต์ชนิดเรียงลำดับก่อนหลัง',openWith: '[ol]\n  [li]',closeWith: '[/li]\n  [li][/li]\n[/ol]'},{className: 'listitembutton',name: 'Li',name: 'ลิสต์',openWith: '\n  [li]',closeWith: '[/li]'},{className: 'hrbutton',name: 'HR',name: 'เส้นแนวนอน',openWith: '[hr]'},{className: 'alignleftbutton',name: 'Left',name: 'เรียงชิดซ้าย',openWith: '[left]',closeWith: '[/left]'},{className: 'centerbutton',name: 'Center',name: 'เรียงกึ่งกลาง',openWith: '[center]',closeWith: '[/center]'},{className: 'alignrightbutton',name: 'Right',name: 'เรียงชิดขวา',openWith: '[right]',closeWith: '[/right]'},{separator:'|' },{className: 'quotebutton',name: 'Quote',name: 'อ้างอิงข้อความ',openWith: '[quote]',closeWith: '[/quote]'},{className: 'codesimplebutton',name: 'Code',name: 'Code',openWith: '[code]',closeWith: '[/code]'},{name:'code', className: 'codemodalboxbutton', beforeInsert:function() {
						jQuery('#code-modal-submit').click(function(event) {
							event.preventDefault();

							jQuery('#modal-code').modal('hide');
						});

						jQuery('#modal-code').modal(
							{overlayClose:true, autoResize:true, minHeight:500, minWidth:800, onOpen: function (dialog) {
								dialog.overlay.fadeIn('slow', function () {
									dialog.container.slideDown('slow', function () {
										dialog.data.fadeIn('slow');
									});
								});
							}});
						}
					},{className: 'tablebutton',name: 'table',openWith: '[table]\n  [tr]\n   [td][/td]\n   [td][/td]\n  [/tr]',closeWith: '\n  [tr]\n   [td][/td]\n   [td][/td]\n [/tr]\n[/table] \n'},{className: 'spoilerbutton',name: 'Spoiler',name: 'ข้อความสปอยล์',openWith: '[spoiler]',closeWith: '[/spoiler]'},{className: 'hiddentextbutton',name: 'Hide',name: 'ซ่อนข้อความนี้จากบุคคลทั่วไป',openWith: '[hide]',closeWith: '[/hide]'},{className: 'confidentialbutton',name: 'confidential',name: 'รายงานพิเศษ:',openWith: '[confidential]',closeWith: '[/confidential]'},{separator:'|' },{name:'ลิงค์รูปภาพ', className: 'picturebutton', beforeInsert:function() {
						jQuery('#picture-modal-submit').click(function(event) {
							event.preventDefault();

							jQuery('#modal-picture').modal('hide');
						});

						jQuery('#modal-picture').modal(
							{overlayClose:true, autoResize:true, minHeight:500, minWidth:800, onOpen: function (dialog) {
								dialog.overlay.fadeIn('slow', function () {
									dialog.container.slideDown('slow', function () {
										dialog.data.fadeIn('slow');
									});
								});
							}});
						}
					},{name:'ลิงค์', className: 'linkbutton', beforeInsert:function() {
						jQuery('#link-modal-submit').click(function(event) {
							event.preventDefault();

							jQuery('#modal-link').modal('hide');
						});

						jQuery('#modal-link').modal(
							{overlayClose:true, autoResize:true, minHeight:500, minWidth:800, onOpen: function (dialog) {
								dialog.overlay.fadeIn('slow', function () {
									dialog.container.slideDown('slow', function () {
										dialog.data.fadeIn('slow');
									});
								});
							}});
						}
					},{separator:'|' },{className: 'ebaybutton',name: 'Ebay',key: 'E',openWith: '[ebay]',closeWith: '[/ebay]'},{name: 'วิดีโอ', className: 'videodropdownbutton', dropMenu: [{name:  'ผู้ให้บริการ', className: 'videourlprovider', beforeInsert:function() {
							jQuery('#videosettings-modal-submit').click(function(event) {
								event.preventDefault();

								jQuery('#modal-video-settings').modal('hide');
							});

							jQuery('#modal-video-settings').modal(
								{overlayClose:true, autoResize:true, minHeight:500, minWidth:800, onOpen: function (dialog) {
									dialog.overlay.fadeIn('slow', function () {
										dialog.container.slideDown('slow', function () {
											dialog.data.fadeIn('slow');
										});
									});
								}});
							} },
						{name: 'วิดีโอ', className: 'videoURLbutton', beforeInsert:function() {
							jQuery('#videourlprovider-modal-submit').click(function(event) {
								event.preventDefault();

								jQuery('#modal-video-urlprovider').modal('hide');
							});

							jQuery('#modal-video-urlprovider').modal(
								{overlayClose:true, autoResize:true, minHeight:500, minWidth:800, onOpen: function (dialog) {
									dialog.overlay.fadeIn('slow', function () {
										dialog.container.slideDown('slow', function () {
											dialog.data.fadeIn('slow');
										});
									});
								}});
							} }
						]},{name:'แผนที่', className: 'mapbutton', beforeInsert:function() {
						jQuery('#map-modal-submit').click(function(event) {
							event.preventDefault();

							jQuery('#modal-map').modal('hide');
						});

						jQuery('#modal-map').modal(
							{overlayClose:true, autoResize:true, minHeight:500, minWidth:800, onOpen: function (dialog) {
								dialog.overlay.fadeIn('slow', function () {
									dialog.container.slideDown('slow', function () {
										dialog.data.fadeIn('slow');
									});
								});
							}});
						}
					},{name:'poll-settings', className: 'pollbutton', beforeInsert:function() {
						jQuery('#poll-settings-modal-submit').click(function(event) {
							event.preventDefault();

							jQuery('#modal-poll-settings').modal('hide');
						});

						jQuery('#modal-poll-settings').modal(
							{overlayClose:true, autoResize:true, minHeight:500, minWidth:800, onOpen: function (dialog) {
								dialog.overlay.fadeIn('slow', function () {
									dialog.container.slideDown('slow', function () {
										dialog.data.fadeIn('slow');
									});
								});
							}});
						}
					},{className: 'tweetbutton',name: 'Tweet',openWith: '[tweet]',closeWith: '[/tweet]'},{className: 'soundcloudbutton',name: 'soundcloud',openWith: '[soundcloud]',closeWith: '[/soundcloud]'},{className: 'instagrambutton',name: 'instagram',openWith: '[instagram]',closeWith: '[/instagram]'},{name:'อีโมติคอน', className: 'emoticonsbutton', beforeInsert:function() {
						jQuery('#emoticons-modal-submit').click(function(event) {
							event.preventDefault();

							jQuery('#modal-emoticons').modal('hide');
						});

						jQuery('#modal-emoticons').modal(
							{overlayClose:true, autoResize:true, minHeight:500, minWidth:800, onOpen: function (dialog) {
								dialog.overlay.fadeIn('slow', function () {
									dialog.container.slideDown('slow', function () {
										dialog.data.fadeIn('slow');
									});
								});
							}});
						}
					},{separator:'|' },]};