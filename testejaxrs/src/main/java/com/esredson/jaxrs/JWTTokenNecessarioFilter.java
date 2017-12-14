package com.esredson.jaxrs;

import java.io.IOException;

import javax.annotation.Priority;
import javax.ws.rs.Priorities;
import javax.ws.rs.container.ContainerRequestContext;
import javax.ws.rs.container.ContainerRequestFilter;
import javax.ws.rs.core.HttpHeaders;
import javax.ws.rs.core.Response;
import javax.ws.rs.core.Response.ResponseBuilder;
import javax.ws.rs.ext.Provider;

import org.apache.commons.codec.binary.Base64;

import com.auth0.jwt.JWT;
import com.auth0.jwt.JWTVerifier;
import com.auth0.jwt.algorithms.Algorithm;

@Provider
@JWTTokenNecessario
@Priority(Priorities.AUTHENTICATION)
public class JWTTokenNecessarioFilter implements ContainerRequestFilter {

	public void filter(ContainerRequestContext ctx) throws IOException {
		String auth = ctx.getHeaderString(HttpHeaders.AUTHORIZATION);
		if (!validateToken(auth))
			ctx.abortWith(Response.status(Response.Status.UNAUTHORIZED).build());
	}
	
	private boolean validateToken(String auth) {
		try {
			String token = auth.substring("Bearer".length()).trim();
			JWTVerifier verifier = JWT
					.require(Algorithm.HMAC256("6wRzYFJkCqaSs2R8EQ0Iqt8nKZU="))
					.withIssuer("Teste")
					.build();
			verifier.verify(token);
			return true;
		} catch(Exception e) {
			//e.printStackTrace();
			return false;
		}
	}
}
