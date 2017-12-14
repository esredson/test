package com.esredson.jaxrs;

import javax.ws.rs.GET;
import javax.ws.rs.HeaderParam;
import javax.ws.rs.Path;
import javax.ws.rs.core.HttpHeaders;
import javax.ws.rs.core.Response;
import javax.ws.rs.core.Response.Status;

import org.apache.commons.codec.binary.Base64;

import com.auth0.jwt.JWT;
import com.auth0.jwt.algorithms.Algorithm;

@Path("/protected")
public class MyProtectedService {

	@GET
	@Path("/teste")
	@JWTTokenNecessario
	public Response teste(){
		return Response.ok().build();
	}
	
	@GET
	@Path("/authenticate")
	public Response authenticate(@HeaderParam("Authorization") String auth){
		try {
			String credentialsBase64 = auth.substring("Basic".length()).trim();
			String credentials = new String(Base64.decodeBase64(credentialsBase64.getBytes()));
			if (!credentials.equals("testUser:testPass"))
				throw new Exception("Wrong credentials");
			String token = JWT.create()
					.withIssuer("Teste")
			        .sign(Algorithm.HMAC256("6wRzYFJkCqaSs2R8EQ0Iqt8nKZU="));
			return Response.ok().header(HttpHeaders.AUTHORIZATION, "Bearer " + token).build();
		} catch(Exception e) {
			return Response.status(Status.UNAUTHORIZED).build();
		}
	}
	
}
