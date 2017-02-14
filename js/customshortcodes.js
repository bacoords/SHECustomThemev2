

(function () {




	tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
		editor.addButton( 'my_mce_button', {
			text: 'Custom Shortcodes',
			icon: false,
			type: 'menubutton',
			menu: [
//				{
//					text: 'Insert Vimeo',
//					menu: [
//						{
//							text: 'Vimeo',
//							onclick: function() {
//								editor.windowManager.open( {
//									title: 'Insert Custom Vimeo',
//									body: [
//										{
//											type: 'textbox',
//											name: 'vimeoName',
//											label: '8 Digit Vimeo Code',
//											value: '12345678'
//										},
//										{
//											type: 'textbox',
//											name: 'headingName',
//											label: 'Video Headline',
//											value: 'Sample Headline'
//										},
//										{
//											type: 'textbox',
//											name: 'taglineName',
//											label: 'Video Tagline',
//											value: 'Sample Tagline'
//										}
//									],
//									onsubmit: function( e ) {
//										editor.insertContent( '[Vimeo id="' + e.data.vimeoName + '" headline="' + e.data.headingName + '" tagline="' + e.data.taglineName + '"]');
//									}
//								});
//							}
//						}
//					]
//				},
				{
					text: 'Icon Font',
					menu: [
						{
							text: 'Insert [Icon name="facebook"]',
							onclick: function() {
								editor.insertContent('[Icon name="facebook"]');
							}
						},
						{
							text: 'Insert [Icon name="linkedin"]',
							onclick: function() {
								editor.insertContent('[Icon name="linkedin"]');
							}
						},
						{
							text: 'Insert [Icon name="rss"]',
							onclick: function() {
								editor.insertContent('[Icon name="rss"]');
							}
						},
						{
							text: 'Insert [Icon name="vimeo"]',
							onclick: function() {
								editor.insertContent('[Icon name="vimeo"]');
							}
						},
						{
							text: 'Insert [Icon name="beaker"]',
							onclick: function() {
								editor.insertContent('[Icon name="beaker"]');
							}
						},
						{
							text: 'Insert [Icon name="blank"]',
							onclick: function() {
								editor.insertContent('[Icon name="blank"]');
							}
						},
						{
							text: 'Insert [Icon name="cash"]',
							onclick: function() {
								editor.insertContent('[Icon name="cash"]');
							}
						},
						{
							text: 'Insert [Icon name="certificate"]',
							onclick: function() {
								editor.insertContent('[Icon name="certificate"]');
							}
						},
						{
							text: 'Insert [Icon name="checklist"]',
							onclick: function() {
								editor.insertContent('[Icon name="checklist"]');
							}
						},
						{
							text: 'Insert [Icon name="classroom"]',
							onclick: function() {
								editor.insertContent('[Icon name="classroom"]');
							}
						},
						{
							text: 'Insert [Icon name="cross"]',
							onclick: function() {
								editor.insertContent('[Icon name="cross"]');
							}
						},
						{
							text: 'Insert [Icon name="dollarsign"]',
							onclick: function() {
								editor.insertContent('[Icon name="dollarsign"]');
							}
						},
						{
							text: 'Insert [Icon name="forrent"]',
							onclick: function() {
								editor.insertContent('[Icon name="forrent"]');
							}
						},
						{
							text: 'Insert [Icon name="group"]',
							onclick: function() {
								editor.insertContent('[Icon name="group"]');
							}
						},
						{
							text: 'Insert [Icon name="hammer"]',
							onclick: function() {
								editor.insertContent('[Icon name="hammer"]');
							}
						},
						{
							text: 'Insert [Icon name="handshake"]',
							onclick: function() {
								editor.insertContent('[Icon name="handshake"]');
							}
						},
						{
							text: 'Insert [Icon name="heart"]',
							onclick: function() {
								editor.insertContent('[Icon name="heart"]');
							}
						},
						{
							text: 'Insert [Icon name="house"]',
							onclick: function() {
								editor.insertContent('[Icon name="house"]');
							}
						},
						{
							text: 'Insert [Icon name="housecouple"]',
							onclick: function() {
								editor.insertContent('[Icon name="housecouple"]');
							}
						},
						{
							text: 'Insert [Icon name="housekey"]',
							onclick: function() {
								editor.insertContent('[Icon name="housekey"]');
							}
						},
						{
							text: 'Insert [Icon name="houseleaf"]',
							onclick: function() {
								editor.insertContent('[Icon name="houseleaf"]');
							}
						},
						{
							text: 'Insert [Icon name="info"]',
							onclick: function() {
								editor.insertContent('[Icon name="info"]');
							}
						},
						{
							text: 'Insert [Icon name="manquestion"]',
							onclick: function() {
								editor.insertContent('[Icon name="manquestion"]');
							}
						},
						{
							text: 'Insert [Icon name="pipes"]',
							onclick: function() {
								editor.insertContent('[Icon name="pipes"]');
							}
						},
						{
							text: 'Insert [Icon name="recycle"]',
							onclick: function() {
								editor.insertContent('[Icon name="recycle"]');
							}
						},
						{
							text: 'Insert [Icon name="speechbubble"]',
							onclick: function() {
								editor.insertContent('[Icon name="speechbubble"]');
							}
						},
						{
							text: 'Insert [Icon name="warning"]',
							onclick: function() {
								editor.insertContent('[Icon name="warning"]');
							}
						},
						{
							text: 'Insert [Icon name="waterdrop"]',
							onclick: function() {
								editor.insertContent('[Icon name="waterdrop"]');
							}
						},
						{
							text: 'Insert [Icon name="waterglass"]',
							onclick: function() {
								editor.insertContent('[Icon name="waterglass"]');
							}
						},
						{
							text: 'Insert [Icon name="waterhand"]',
							onclick: function() {
								editor.insertContent('[Icon name="waterhand"]');
							}
						}
					]
				},
				{
					text: 'Insert Grid',
					menu: [
						{
							text: 'Two Columns',
							onclick: function() {
								editor.insertContent('[GridTwo]<BR>[GridItemTwo]Column-1[/GridItemTwo]<BR>[GridItemTwo]Column-2[/GridItemTwo]<BR>[/GridTwo]');
							}
						},
						{
							text: 'Three Columns',
							onclick: function() {
								editor.insertContent('[GridThree]<BR>[GridItemThree]Column-1[/GridItemThree]<BR>[GridItemThree]Column-2[/GridItemThree]<BR>[GridItemThree]Column-3[/GridItemThree]<BR>[/GridThree]');
							}
						},
						{
							text: 'Four Columns',
							onclick: function() {
								editor.insertContent('[GridFour]<BR>[GridItemFour]Column-1[/GridItemFour]<BR>[GridItemFour]Column-2[/GridItemFour]<BR>[GridItemFour]Column-3[/GridItemFour]<BR>[GridItemFour]Column-4[/GridItemFour]<BR>[/GridFour]');
							}
						},
						{
							text: 'Five Columns',
							onclick: function() {
								editor.insertContent('[GridFive]<BR>[GridItemFive]Column-1[/GridItemFive]<BR>[GridItemFive]Column-2[/GridItemFive]<BR>[GridItemFive]Column-3[/GridItemFive]<BR>[GridItemFive]Column-4[/GridItemFive]<BR>[GridItemFive]Column-5[/GridItemFive]<BR>[/GridFive]');
							}
						},
						{
							text: 'Six Columns',
							onclick: function() {
								editor.insertContent('[GridSix]<BR>[GridItemSix]Column-1[/GridItemSix]<BR>[GridItemSix]Column-2[/GridItemSix]<BR>[GridItemSix]Column-3[/GridItemSix]<BR>[GridItemSix]Column-4[/GridItemSix]<BR>[GridItemSix]Column-5[/GridItemSix]<BR>[GridItemSix]Column-6[/GridItemSix]<BR>[/GridSix]');
							}
						}
					]
				},
				{
					text: 'Custom Formatting',
					menu: [
						{
							text: 'Blue Heading with Triangle Underline',
							onclick: function() {
								editor.insertContent('[HeadingBlueTriangle]' + editor.selection.getContent() + '[/HeadingBlueTriangle]');
							}
						},
						{
							text: 'Blue Square Button',
							onclick: function() {
								editor.insertContent('[Button]' + editor.selection.getContent() + '[/Button]');
							}
						},
						{
							text: 'Extra Buffer Space',
							onclick: function() {
								editor.insertContent('[Buffer]');
							}
						}
                    ]
				},
				{
					text: 'Custom Displays',
					menu: [
						{
							text: 'Insert [ShowJobPostings]',
							onclick: function() {
								editor.insertContent('[ShowJobPostings]');
							}
						},
						{
							text: 'Insert [DisplayPropertiesRentalCommunities]',
							onclick: function() {
								editor.insertContent('[DisplayPropertiesRentalCommunities]');
							}
						},
						{
							text: 'Insert [DisplayPropertiesUpcoming]',
							onclick: function() {
								editor.insertContent('[DisplayPropertiesUpcoming]');
							}
						},
						{
							text: 'Insert [DisplayPropertiesCurrentProjects]',
							onclick: function() {
								editor.insertContent('[DisplayPropertiesCurrentProjects]');
							}
						},
						{
							text: 'Insert [HealthyHomesandCommunities]',
							onclick: function() {
								editor.insertContent('[HealthyHomesandCommunities]');
							}
						},
						{
							text: 'Insert [IntakeFormButton]',
							onclick: function() {
								editor.insertContent('[IntakeFormButton]');
							}
						},						
						{
							text: 'Insert [CustomVimeoBox] (use form below)',
							onclick: function() {
								editor.insertContent('[CustomVimeoBox]');
							}
						}
                    ]
				}
			]
		});
	});
})();