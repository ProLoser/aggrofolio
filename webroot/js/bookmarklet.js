/*
var a = document.title,
	b = document.location.href,
	c = document.getElementsByTagName('meta'),
	d = '', 
	i = c.length;
while(i--){
	if (c[i].name.toLowerCase()=='description'){
		d=c[i].content;
	}
}
window.open(
	'http://localhost/aggropholio/admin/bookmarks/add/name:'+a
	+'/description:'+d
	+'/url:'+b
		.replace(/\//g, '@s@')
		.replace(/:/g, '@c@')
		.replace(/#/g, '@h@')
		.replace(/\?/g, '@q@'),
	'New Bookmark',
	'width=400,height=400,location=0,directories=0,status=0,menubar=0,copyhistory=0'
);*/

$(function(){
	$('[value="Cancel"]').click(function(){
		self.close();
	});
});