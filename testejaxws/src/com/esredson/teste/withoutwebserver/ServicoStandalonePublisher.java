package com.esredson.teste.withoutwebserver;

import javax.xml.ws.Endpoint;

import com.esredson.teste.Servico;

public class ServicoStandalonePublisher {

	public static void main(String[] args) {
			//Publicando como http://localhost:8080/ws/teste1?wsdl
		   Endpoint.publish("http://localhost:8080/ws/servico", new Servico());
	    }
}
