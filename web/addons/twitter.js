/**
 * Created with JetBrains PhpStorm.
 * User: Rux
 * Date: 2/5/2556
 * Time: 11:32 น.
 * To change this template use File | Settings | File Templates.
 */
JCEMediaBox.Popup.setAddons('flash',{twitvid:function(v){if(/twitvid(.+)\/(.+)/.test(v)){var s='http://www.twitvid.com/player/';return{width:425,height:344,type:'flash','allowFullScreen':true,'allowscriptaccess':'always','allowNetworking':'all','wmode':'transparent','src':v.replace(/(.+)twitvid([^\/]+)\/(.+)/,function(a,b,c,d){return s+d})}}}});JCEMediaBox.Popup.setAddons('image',{twitpic:function(v){if(/twitpic(.+)\/(.+)/.test(v)){return{type:'image'}}}});