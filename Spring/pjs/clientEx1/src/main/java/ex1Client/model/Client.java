package ex1Client.model;

import java.util.List;

import com.fasterxml.jackson.annotation.JsonIgnore;

import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@NoArgsConstructor @AllArgsConstructor @Data
@Entity
public class Client {
	@Id
	public long id;
	public int code;
	public String nom;
	public String date_naiss;
	@OneToMany(mappedBy = "client")
	@JsonIgnore
	List<Compte> comptes;
}
