package com.esredson.jaxrs;

import java.io.IOException;
import java.net.URI;
import java.net.URISyntaxException;

import javax.ws.rs.client.ClientBuilder;
import javax.ws.rs.client.WebTarget;

import org.glassfish.grizzly.http.server.HttpServer;
import org.glassfish.jersey.grizzly2.httpserver.GrizzlyHttpServerFactory;
import org.glassfish.jersey.server.ResourceConfig;
import org.junit.After;
import org.junit.Before;

public abstract class MyTest {

	HttpServer server;
	private static String LOCALHOST = "http://localhost:8080/";
	
	protected abstract String getPath();

	// Enviar post pelo cmd: curl -d "conteudo aqui" http://localhost:8080/teste
	
	@Before
	public void setup() throws URISyntaxException, IOException{
		ResourceConfig config = new ResourceConfig().packages("com.esredson.jaxrs");
		URI uri = new URI(LOCALHOST);
		this.server = GrizzlyHttpServerFactory.createHttpServer(uri, config);
		this.server.start();
	}
	
	@After
	public void teardown() {
		server.shutdown();
	}
	
	protected WebTarget request(String path) {
		//Usando a client API do JAX-RS:
		return ClientBuilder.newClient().target(LOCALHOST + getPath() + "/" + path);
	}
	
}
