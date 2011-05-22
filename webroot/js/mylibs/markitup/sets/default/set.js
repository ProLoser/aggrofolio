// ----------------------------------------------------------------------------
// markItUp!
// ----------------------------------------------------------------------------
// Copyright (C) 2008 Jay Salvat
// http://markitup.jaysalvat.com/
// ----------------------------------------------------------------------------
// Html tags
// http://en.wikipedia.org/wiki/html
// ----------------------------------------------------------------------------
// Basic set. Feel free to add more tags
// ----------------------------------------------------------------------------
mySettings = {	
	onShiftEnter:  	{keepDefault:false, replaceWith:'<br />\n'},
	onCtrlEnter:  	{keepDefault:false, openWith:'\n<p>', closeWith:'</p>'},
	onTab:    		{keepDefault:false, replaceWith:'    '},
	markupSet:  [ 	
		{name:'Paragraph', openWith:'(!(<p>|!|<b>)!)', closeWith:'(!(</p>|!|</b>)!)' },
		{name:'Code', key:'C', openWith:'(!(<pre>|!|<code>)!)', closeWith:'(!(</pre>|!|</code>)!)' },
		{name:'List', key:'U', openWith:'(!(<li>|!|<ul>)!)', closeWith:'(!(</li>|!|</ul>)!)' },
		{name:'Quote', key:'Q', openWith:'(!(<blockquote>|!|<quote>)!)', closeWith:'(!(</blockquote>|!|</quote>)!)' },
		{separator:'---------------' },
		{name:'Heading 1', key:'1', openWith:'<h1>', closeWith:'</h1>' },
		{name:'Heading 2', key:'2', openWith:'<h2>', closeWith:'</h2>' },
		{name:'Heading 3', key:'3', openWith:'<h3>', closeWith:'</h3>' },
		{name:'Heading 4', key:'4', openWith:'<h4>', closeWith:'</h4>' },
		{name:'Heading 5', key:'5', openWith:'<h5>', closeWith:'</h5>' },
		{name:'Heading 6', key:'6', openWith:'<h6>', closeWith:'</h6>' },
		{separator:'---------------' },
		{name:'Bold', key:'B', openWith:'(!(<strong>|!|<b>)!)', closeWith:'(!(</strong>|!|</b>)!)' },
		{name:'Italic', key:'I', openWith:'(!(<em>|!|<i>)!)', closeWith:'(!(</em>|!|</i>)!)'  },
		{name:'Stroke through', key:'S', openWith:'<del>', closeWith:'</del>' },
		{separator:'---------------' },
		{name:'Horizontal Rule', key:'H', replaceWith:'<hr>' },
		{name:'Picture', key:'P', replaceWith:'<img src="[![Source:!:http://]!]" alt="[![Alternative text]!]" />' },
		{name:'Link', key:'L', openWith:'<a href="[![Link:!:http://]!]"(!( title="[![Title]!]")!)>', closeWith:'</a>', placeHolder:'Your text to link...' },
		{separator:'---------------' },
		{name:'Clean', className:'clean', replaceWith:function(markitup) { return markitup.selection.replace(/<(.*?)>/g, "") } },		
		{name:'Preview', className:'preview',  call:'preview'}
	]
}