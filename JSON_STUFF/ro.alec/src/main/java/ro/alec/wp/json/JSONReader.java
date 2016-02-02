package ro.alec.wp.json;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.Reader;
import java.net.URL;
import java.nio.charset.Charset;
import java.util.ArrayList;
import java.util.List;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class JSONReader {

	private static String readAll(Reader rd) throws IOException {
		StringBuilder sb = new StringBuilder();
		int cp;
		while ((cp = rd.read()) != -1) {
			sb.append((char) cp);
		}
		return sb.toString();
	}

	public static JSONArray readJsonFromUrl(String url) throws IOException, JSONException {
		InputStream is = new URL(url).openStream();
		try {
			BufferedReader rd = new BufferedReader(new InputStreamReader(is, Charset.forName("UTF-8")));
			String jsonText = readAll(rd);
			JSONArray json = new JSONArray(jsonText);
			return json;
		} finally {
			is.close();
		}
	}

	public static List<Post> getPostsFromURL(String url) throws JSONException, IOException{
		JSONArray json = readJsonFromUrl(url);
		// System.out.println(json.toString());
		List<Post> wordpressPosts = new ArrayList<Post>();
		for(int n = 0; n < json.length(); n++)
		{
		    JSONObject object = json.getJSONObject(n);
		    JSONObject titleJSON = object.getJSONObject("title");
		    String renderedTitle = titleJSON.getString("rendered");
		    Post p = new Post();
		    p.setId(object.getInt("id"));
		    p.setTitle(renderedTitle);
		    wordpressPosts.add(p);
		}
		return wordpressPosts;
	}
	
	
	
	public static void main(String[] args) throws IOException, JSONException {
		System.out.println("************************");
		System.out.println("*Minunatii cu Wordpress*");
		System.out.println("************************");
		
		
		
		String url = args[0]; // "http://localhost/zecl_workspace/wp3/wp-json/wp/v2/posts";
		List<Post> posts = getPostsFromURL(url);
		System.out.println("Am dibuit post-urile:");
		for(Post p : posts){
			System.out.println(p.getTitle());
		}
//		System.out.println("PSTS: " + posts);
		
	}
}